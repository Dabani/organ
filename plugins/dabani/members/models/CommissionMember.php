<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Commission;
use Dabani\Members\Models\Position;
use Dabani\Members\Models\Member;

/**
 * Model
 */
class CommissionMember extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_commissions_members';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'commission' => [
      Commission::class,
      'table' => 'dabani_members_commissions',
      'order' => 'name'
    ],
    'position' => [
      Position::class,
      'table' => 'dabani_members_positions',
      'order' => 'name'
    ],
    'member' => [
      Member::class,
      'table' => 'dabani_members_',
      'order' => 'id'
    ]
  ];
}
