<?php namespace Nova\Idealprint\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class NewsController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_news' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Nova.Idealprint', 'menu_idealprint', 'side-menu-item');
    }
}
