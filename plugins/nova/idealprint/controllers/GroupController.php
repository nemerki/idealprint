<?php namespace Nova\Idealprint\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class GroupController extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'manage_group' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Nova.Idealprint', 'menu_idealprint', 'side-menu-group');
    }
}
