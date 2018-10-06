<?php namespace Nova\Idealprint\Components;

use Cms\Classes\ComponentBase;
use Nova\Idealprint\Models\Field;

class FieldComponent extends ComponentBase
{

    public $slug;

    public function componentDetails()
    {
        return [
            'name' => 'Field',
            'description' => 'Field Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    protected function prepareVars()
    {
        $this->slug = $this->param('slug');
    }


    public function onRun()
    {
        $this->prepareVars();
        $this->page['field'] = $this->listField();
        $this->page['products'] = $this->listProduct();


    }

    protected function listField()
    {
        $model = Field::with('products')->where("slug", $this->slug)->first();
        return $model;

    }

    protected function listProduct()
    {

        $model = Field::with('products')->where("slug", $this->slug)->first();
        return $model->products()->where('is_active', "1")->orderBy('title')->paginate(12);
    }


    public function onPaginate()
    {
        $this->prepareVars();
        $perPage = post('perPage');
        $pageNumber = $perPage;

        $model = Field::with('products')->where("slug", $this->slug)->first();
        $partialsRecords = $model->products()->where('is_active', "1")->orderBy('title')->paginate(12, $pageNumber);

        $this->records = $this->page['partialsRecords'] = $partialsRecords;

    }

}
