<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Member;
use Dabani\Members\Models\Level;

/**
 * Model
 */
class Study extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_studies';

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
    'level' => [
      Level::class,
      'table' => 'dabani_members_levels',
      'order' => 'id'
    ]
  ];
}
