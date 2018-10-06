<?php namespace Nova\Idealprint\Components;

use Cms\Classes\ComponentBase;
use Nova\Idealprint\Models\Cartegory;


class CategoryComponent extends ComponentBase
{

    public $slug;

    public function componentDetails()
    {
        return [
            'name' => 'Category',
            'description' => 'Category Page Component'
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
        $this->page['category'] = $this->listCategory();
        $this->page['products'] = $this->listProduct();


    }

    protected function listCategory()
    {
        $model = Cartegory::with('products')->where("slug", $this->slug)->first();
        return $model;

    }

    protected function listProduct()
    {

        $model = Cartegory::with('products')->where("slug", $this->slug)->first();
        return $model->products()->where('is_active', "1")->orderBy('title')->paginate(12);
    }


    public function onPaginate()
    {
        $this->prepareVars();
        $perPage = post('perPage');
        $pageNumber = $perPage;

        $model = Cartegory::with('products')->where("slug", $this->slug)->first();
        $partialsRecords = $model->products()->where('is_active', "1")->orderBy('title')->paginate(12, $pageNumber);

        $this->records = $this->page['partialsRecords'] = $partialsRecords;

    }


}
