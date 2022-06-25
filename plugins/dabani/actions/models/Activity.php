<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Dabani\Actions\Models\Goal;
use Dabani\Actions\Models\Objective;
use Dabani\Actions\Models\Indicator;
use Dabani\Actions\Models\Concept;

/**
 * Model
 */
class Activity extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_activities';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $hasMany = [
    'goals' => [
      Goal::class,
      'table' => 'dabani_actions_goals',
      'order' => 'name'
    ],
    'objectives' => [
      Objective::class,
      'table' => 'dabani_actions_objectives',
      'order' => 'name'
    ],
    'tasks' => [
      Task::class,
      'table' => 'dabani_actions_tasks',
      'order' => 'name'
    ]
  ];

  public $hasOne = [
    'concept' => [
      Concept::class,
      'table' => 'dabani_actions_concepts'
    ]
  ];
}
