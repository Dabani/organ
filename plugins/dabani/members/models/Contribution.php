<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Event;
use Dabani\Members\Models\Cause;
use Dabani\Members\Models\Member;

/**
 * Model
 */
class Contribution extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_contributions';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'event' => [
      Event::class,
      'table' => 'dabani_members_events',
      'order' => 'name'
    ],
    'cause' => [
      Cause::class,
      'table' => 'dabani_members_causes',
      'order' => 'name'
    ],
    'member' => [
      Member::class,
      'table' => 'dabani_members_',
      'order' => 'last_name'
    ]
  ];
}
