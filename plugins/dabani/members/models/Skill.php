<?php namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;

/**
 * Model
 */
class Skill extends Model
{
    use \Winter\Storm\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'dabani_members_skills';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

  public $belongsToMany = [
    'members' => [
      Member::class,
      'table' => 'dabani_members_skills_members',
      'pivot' => ['skill_id', 'member_id'],
      'order' => 'first_name'
    ]
  ];
}
