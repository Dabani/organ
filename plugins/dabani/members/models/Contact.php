<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Member;
use Dabani\Members\Models\Country;

/**
 * Model
 */
class Contact extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_contacts';

  /**
   * @var array Validation rules
   */
  public $rules = [
    'telephone' => 'required|numeric'
  ];

  /**
   * Relations
   */

  public $belongsTo = [
    'member' => [
      Member::class,
      'table' => 'dabani_members_',
      'order' => 'email'
    ],
    'country' => [
      Country::class,
      'table' => 'dabani_members_countries',
      'order' => 'name'
    ]
  ];
}
