<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Member;
use Dabani\Members\Models\Country;

/**
 * Model
 */
class Profile extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_profiles';

  /**
   * @var array Validation rules
   */
  public $rules = [];

  /**
   * Relations
   */

  public $belongsTo = [
    'profile' => [
      Member::class,
      'table' => 'dabani_members_',
      'key' => 'member_id',
      'order' => 'first_name'
    ],
    'nationality' => [
      Country::class,
      'table' => 'dabani_members_countries',
      'key' => 'country_id',
      'order' => 'name'
    ]
  ];

  public $attachOne = [
    'poster' => 'System\Models\File'
  ];

  public function getProfileFullNameAttribute()
  {
    return $this->first_name . ' ' . $this->last_name;
  }
}
