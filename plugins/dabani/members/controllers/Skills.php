<?php namespace Dabani\Members\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Skills extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Dabani.Members', 'main-menu-item', 'side-menu-skill');
    }
}
