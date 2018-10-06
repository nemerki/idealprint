<?php namespace Nova\Idealprint\Components;

use Cms\Classes\ComponentBase;
use Nova\Idealprint\Models\Group;
use Nova\Idealprint\Models\Product;
use Nova\Idealprint\Models\Cartegory;

class FilterComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Filter',
            'description' => 'Sidbar filter component'
        ];
    }

    public function defineProperties()
    {
        return [];
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


        $model = Product::where('is_active', "1");
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
