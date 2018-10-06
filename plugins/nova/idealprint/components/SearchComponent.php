<?php namespace Nova\Idealprint\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Nova\Idealprint\Models\Product;

class SearchComponent extends ComponentBase
{
    public $slug;

    public function componentDetails()
    {
        return [
            'name' => 'Search',
            'description' => 'Search Page Component'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    protected function prepareVars()
    {
        $this->slug = Input::get('q');

    }


    public function onRun()
    {
        $this->prepareVars();

        $this->page['products'] = $this->listProduct();

    }


    protected function listProduct()
    {

        $model = Product::with('cartegory')->where('is_active', "1")->orderBy('title')->where('title', 'like', "%" . $this->slug . "%")
            ->orWhere('content', 'like', "%" . $this->slug . "%")
            ->paginate(12);
        return $model;
    }

    public function onFilter()
    {
        $category = post('category');
        $field = post('field');
        $brand = post('brand');
        $color = post('color');
        $group = post('group');


        if (post('category') == null) {
            $category = [];
        }
        if (post('field') == null) {
            $field = [];
        }
        if (post('brand') == null) {
            $brand = [];
        }

        $qry = Input::get('q');
        $model = Product::where('is_active', "1")->where(function ($query) use ($qry) {

            $query->orWhere('title', 'like', "%" . $qry . "%")
                ->orWhere('content', 'like', "%" . $qry . "%");

        });
        if ($group != null) {
            $categories = [];
            $groupModel = new Group();
            foreach ($group as $value) {
                $d = $groupModel->where("id", $value)->first();
                $c = $d->categories()->get();
                foreach ($c as $cat) {
                    $categories[] = $cat->id;
                }

            }
            $allCategory = array_unique($categories);
            $model->where(function ($query) use ($allCategory) {
                foreach ($allCategory as $value) {
                    $query->orWhere('cartegory_id', '=', $value);
                }
            });
        }

        $model->where(function ($query) use ($category) {
            foreach ($category as $value) {
                $query->orWhere('cartegory_id', '=', $value);
            }
        })->where(function ($query) use ($field) {
            foreach ($field as $value) {
                $query->orWhere('field_id', '=', $value);
            }
        })->where(function ($query) use ($brand) {
            foreach ($brand as $value) {
                $query->orWhere('brand_id', '=', $value);
            }
        });
        if ($color != null) {
            $model->whereHas('colors', function ($q) use ($color) {

                $q->where('color_id', '=', $color);

            });

        }
        $model = $model->orderBy('title')->paginate(12);
        $this->page['partialsRecords'] = $model;

    }

}
