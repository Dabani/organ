<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Director;
use Dabani\Members\Models\CommissionMember;

/**
 * Model
 */
class Position extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_positions';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $hasMany = [
    'position' => [
      [
        Director::class,
        'table' => 'dabani_members_directors',
        'order' => 'id'
      ],
      [
        CommissionMember::class,
        'table' => 'dabani_members_commissions_members',
        'order' => 'id'
      ]
    ],
  ];
}
