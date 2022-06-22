<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Profile;
use Dabani\Members\Models\Contact;

/**
 * Model
 */
class Country extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_countries';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'nationality' => [
      Profile::class,
      'table' => 'dabani_members_profiles',
      'order' => 'name'
    ]
  ];

  public $hasOne = [
    'country' => [
      Contact::class,
      'table' => 'dabani_members_contacts',
      'order' => 'id'
    ]
  ];
}
