<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Contribution;


/**
 * Model
 */
class Cause extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_causes';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relation
   */

  public $hasOne = [
    'cause' => [
      Contribution::class,
      'table' => 'dabani_members_contributions',
      'order' => 'id'
    ]
  ];
}
