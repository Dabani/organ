<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Dabani\Actions\Models\Activity;
use Dabani\Actions\Models\Material;
use Winter\User\Models\User;

/**
 * Model
 */
class Task extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_tasks';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'activity' => [
      Activity::class,
      'table' => 'dabani_actions_activities',
      'order' => 'name'
    ],
    'entity' => [
      Entity::class,
      'table' => 'dabani_actions_entities',
      'order' => 'name'
    ]
  ];

  public $belongsToMany = [
    'materials' => [
      Material::class,
      'table' => 'dabani_actions_materials_tasks',
      'pivot' => ['material_id', 'task_id'],
      'order' => 'name'
    ],
    'users' => [
      User::class,
      'table' =>  'dabani_actions_assignments',
      'pivot' =>  ['task_id', 'user_id'],
      'order' =>  'name'
    ]
  ];

  public $hasMany = [
    'challenges' => [
      Challenge::class,
      'table' => 'dabani_actions_challenges',
      'order' => 'name'
    ]
  ];
}
