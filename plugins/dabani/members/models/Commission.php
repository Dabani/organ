<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\CommissionMember;

/**
 * Model
 */
class Commission extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_commissions';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $hasMany = [
    'commission' => [
      CommissionMember::class,
      'table' => 'dabani_members_commissions_members',
      'order' => 'id'
    ]
  ];
}
