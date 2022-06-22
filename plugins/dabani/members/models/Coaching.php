<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Training;
use Dabani\Members\Models\Member;

/**
 * Model
 */
class Coaching extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_coachings';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'member' => [
      Member::class,
      'table' => 'dabani_members_',
      'order' => 'first_name'
    ],
    'training' => [
      Training::class,
      'table' => 'dabani_members_trainings',
      'order' => 'id'
    ]
  ];
}
