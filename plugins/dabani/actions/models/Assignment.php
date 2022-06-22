<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Dabani\Actions\Models\Task;
use Winter\User\Models\User;

/**
 * Model
 */
class Assignment extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_assignments';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'task' => [
      Task::class,
      'table' => 'dabani_actions_tasks',
      'order' => 'name'
    ],
    'user' => [
      User::class,
      'table' => 'users',
      'order' => 'name'
    ]
  ];
}
