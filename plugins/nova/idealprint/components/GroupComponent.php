<?php namespace Nova\Idealprint\Components;

use Cms\Classes\ComponentBase;
use Nova\Idealprint\Models\Group;
use Nova\Idealprint\Models\Product;

class GroupComponent extends ComponentBase
{

    public $slug;

    public function componentDetails()
    {
        return [
            'name' => 'Group',
            'description' => 'Group Page Component'
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
        $this->page['group'] = $this->listGroup();
        $this->page['products'] = $this->listProduct();


    }

    protected function listGroup()
    {
        $model = Group::where("slug", $this->slug)->first();
        return $model;

    }

    protected function listProduct()
    {

        $model = Group::with('categories.products')->where("slug", $this->slug)->first();
        $group = $model->categories()->where('is_active', "1")->get();
        $categoryId = [];
        foreach ($group as $value) {
            $categoryId[] = $value->id;
        }
        $products = Product::where('is_active', "1")->where(function ($query) use ($categoryId) {
            foreach ($categoryId as $value) {
                $query->orWhere('cartegory_id', '=', $value);
            }
        });

        return $products->orderBy('title')->paginate(12);
    }

    public function onPaginate()
    {
        $this->prepareVars();
        $perPage = post('perPage');
        $pageNumber = $perPage;

        $model = Group::with('categories.products')->where("slug", $this->slug)->first();
        $group = $model->categories()->where('is_active', "1")->get();
        $categoryId = [];
        foreach ($group as $value) {
            $categoryId[] = $value->id;
        }
        $products = Product::where('is_active', "1")->where(function ($query) use ($categoryId) {
            foreach ($categoryId as $value) {
                $query->orWhere('cartegory_id', '=', $value);
            }
        });


        $partialsRecords = $products->orderBy('title')->paginate(12, $pageNumber);

        $this->records = $this->page['partialsRecords'] = $partialsRecords;

    }
}
