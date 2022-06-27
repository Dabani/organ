<?php

namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;

/**
 * Model
 */
class Partner extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_actions_partners';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'concept' => [
      Concept::class,
      'table' => 'dabani_actions_concepts',
      'order' => 'name'
    ]
  ];
}
