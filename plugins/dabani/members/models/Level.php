<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Study;

/**
 * Model
 */
class Level extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_levels';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $hasMany = [
    'level' => [
      Study::class,
      'table' => 'dabani_members_studies',
      'order' => 'name'
    ]
  ];
}
