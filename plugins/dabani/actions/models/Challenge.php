<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Dabani\Actions\Models\Task;


/**
 * Model
 */
class Challenge extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_challenges';

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
      'table'   => 'dabani_actions_tasks',
      'order' => 'name'
    ]
  ];
}
