<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Dabani\Actions\Models\Material;
use Dabani\Actions\Models\Task;

/**
 * Model
 */
class MaterialTask extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_materials_tasks';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'material' => [
      Material::class,
      'table' => 'dabani_actions_materials',
      'order' => 'name'
    ],
    'task' => [
      Task::class,
      'table' => 'dabani_actions_tasks',
      'order' => 'name'
    ]
  ];
}
