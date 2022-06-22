<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Field;

/**
 * Model
 */
class Department extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_departments';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */
  /*
    public function field () {
        return $this -> belongsTo(Field::class);
    }
 */
  public $belongsTo = [
    'field' => [
      Field::class,
      'key' => 'field_id',
      'table' => 'dabani_members_fields',
      'order' => 'name'
    ]
  ];
}
