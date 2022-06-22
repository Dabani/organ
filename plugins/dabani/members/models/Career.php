<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Member;
use Dabani\Members\Models\Profession;

/**
 * Model
 */
class Career extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_careers';

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
    'profession' => [
      Profession::class,
      'table' => 'dabani_members_professions',
      'order' => 'id'
    ]
  ];
}
