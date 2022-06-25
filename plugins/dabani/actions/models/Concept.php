<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;
use Dabani\Actions\Models\Activity;
use Dabani\Actions\Models\Detail;

/**
 * Model
 */
class Concept extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_concepts';

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
      'table'   => 'dabani_actions_activities',
      'order' => 'name'
    ]
  ];

  public $hasMany = [
    'details' => [
      Detail::class,
      'table' => 'dabani_actions_details',
      'order' => 'id'
    ]
  ];
}
