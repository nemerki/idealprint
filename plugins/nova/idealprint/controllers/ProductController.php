<?php namespace Nova\Idealprint\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class ProductController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_product' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Nova.Idealprint', 'menu_idealprint', 'side-menu-product');
    }
}
