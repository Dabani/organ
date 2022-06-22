<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Contribution;

/**
 * Model
 */
class Event extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_events';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $hasOne = [
    'event' => [
      Contribution::class,
      'table' => 'dabani_members_contributions',
      'order' => 'id'
    ]
  ];

  public $belongsToMany = [
    'members' => [
      Member::class,
      'table' => 'dabani_members_events_members',
      'pivot' => ['event_id','member_id'],
      'order' => 'first_name'
    ]
  ];
}
