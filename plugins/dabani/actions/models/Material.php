<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Dabani\Actions\Models\Task;

/**
 * Model
 */
class Material extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_materials';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsToMany = [
    'tasks' => [
      Task::class,
      'table' => 'dabani_actions_materials_tasks',
      'pivot' => ['material_id', 'task_id'],
      'order' => 'name'
    ]
  ];
}
