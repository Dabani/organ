<?php namespace Dabani\Actions\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;

class Tasks extends Controller
{
    public $implement = [
      'Backend\Behaviors\ListController',
      'Backend\Behaviors\FormController',
      'Backend\Behaviors\ReorderController',
      'Backend\Behaviors\RelationController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationCofig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Dabani.Actions', 'main-menu-item', 'side-menu-task');
    }
}
