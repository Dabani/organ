<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Winter\User\Models\User;

/**
 * Model
 */
class Entity extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_entities';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsToMany = [
    'users' => [
      User::class,
      'table' => 'dabani_actions_entities_users',
      'pivot' => ['entity_id', 'user_id'],
      'order' => 'name']
  ];

  public $hasMany = [
    'tasks' => [
      Task::class,
      'table' => 'dabani_actions_tasks',
      'order' => 'name'
    ]
  ];
}
