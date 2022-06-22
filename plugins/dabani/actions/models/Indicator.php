<?php namespace Dabani\Actions\Models;

use Winter\Storm\Database\Model;


/**
 * Model
 */
class Indicator extends Model
{
    use \Winter\Storm\Database\Traits\Validation;

    use \Winter\Storm\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dabani_actions_indicators';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

  /**
   * Relations
   */

  public $belongsTo = [
    'objective' => [
      Objective::class,
      'table' => 'dabani_actions_objectives',
      'order' => 'name'
    ]
  ];
}
