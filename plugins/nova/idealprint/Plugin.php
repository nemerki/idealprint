<?php namespace Nova\Idealprint;

use Nova\Idealprint\Models\News;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Nova\Idealprint\Components\CategoryComponent' => 'Category',
            'Nova\Idealprint\Components\GroupComponent' => 'Group',
            'Nova\Idealprint\Components\FilterComponent' => 'Filter',
            'Nova\Idealprint\Components\FieldComponent' => 'Field',
            'Nova\Idealprint\Components\HomeComponent' => 'Home',
            'Nova\Idealprint\Components\BrandComponent' => 'Brand',
            'Nova\Idealprint\Components\SearchComponent' => 'Search',
        ];
    }


    public function registerSettings()
    {
    }


    public function registerFormWidgets()
    {
        return [
            'Nova\Idealprint\FormWidgets\GroupFormWidget' => [
                'label' => 'Group field',
                'code' => 'group'
            ],
            'Nova\Idealprint\FormWidgets\ColorFormWidget' => [
                'label' => 'Color field',
                'code' => 'color'
            ],
        ];

    }


}
