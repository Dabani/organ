<?php

namespace Dabani\Members\Models;

use Winter\Storm\Database\Model;
use Dabani\Members\Models\Profile;
use Dabani\Members\Models\Study;
use Dabani\Members\Models\Coaching;
use Dabani\Members\Models\Career;
use Dabani\Members\Models\Contact;
use Dabani\Members\Models\Network;
use Dabani\Members\Models\Scouting;
use Dabani\Members\Models\Membership;
use Dabani\Members\Models\Director;
use Dabani\Members\Models\CommissionMember;
use Dabani\Members\Models\Contribution;
use Illuminate\Support\Facades\DB;
use Winter\User\Facades\Auth;
use Winter\User\Models\User;
use Winter\User\Models\UserGroup;
use Dabani\Members\Models\Skill;

/**
 * Model
 */
class Member extends Model
{
  use \Winter\Storm\Database\Traits\Validation;

  use \Winter\Storm\Database\Traits\SoftDelete;

  protected $dates = ['deleted_at'];


  /**
   * @var string The database table used by the model.
   */
  public $table = 'dabani_members_';

  /**
   * @var array Validation rules
   */

  public $rules = [
    'email' => 'required|email|unique'
  ];

  /**
   * Relations
   */
  public $belongsTo = [
    'user' => [
      User::class,
      'table' => 'users'
    ]
  ];

  public $hasOne = [
    'profile' => [
      Profile::class,
      'table' => 'dabani_members_profiles',
      'order' => 'id'
    ],
    'contact' => [
      Contact::class,
      'table' => 'dabani_members_contacts',
      'order' => 'id'
    ],
    'scouting' => [
      Scouting::class,
      'table' => 'dabani_members_scoutings',
      'order' => 'id'
    ],
    'membership' => [
      Membership::class,
      'table' => 'dabani_members_memberships',
      'order' => 'id'
    ]
  ];

  public $hasMany = [
    'studies' => [
      Study::class,
      'table' => 'dabani_members_studies',
      'order' => 'name'
    ],
    'coachings' => [
      Coaching::class,
      'table' => 'dabani_members_coachings',
      'order' => 'name'
    ],
    'careers' => [
      Career::class,
      'table' => 'dabani_members_careers',
      'order' => 'from desc'
    ],
    'networks' => [
      Network::class,
      'table' => 'dabani_members_networks',
      'order' => 'name'
    ],
    'contributions' => [
      Contribution::class,
      'table' => 'dabani_members_contributions',
      'order' => 'id'
    ],
    'directors' => [
      Director::class,
      'table' => 'dabani_members_directors',
      'order' => 'id'
    ],
    'commissions' => [
      CommissionMember::class,
      'table' => 'dabani_members_commissions_members',
      'order' => 'id'
    ]
  ];

  public $belongsToMany = [
    'events' => [
      Event::class,
      'table' => 'dabani_members_events_members',
      'pivot' => ['event_id', 'member_id'],
      'order' => 'name'
    ],
    'skills' => [
      Skill::class,
      'table' => 'dabani_members_skills_members',
      'pivot' => ['skill_id', 'member_id'],
      'order' => 'name'
    ]
  ];

  public function getFullNameAttribute()
  {
    return $this->last_name . ' ' . $this->first_name;
  }

  public static function getMemberDetails()
  {
    // Get current user
    if (!Auth::check()) {
      return null;
    }
    $user = Auth::getUser()->email;

    // Get member details
    return Db::table('dabani_members_')
      ->join('users', 'users.email', '=', 'dabani_members_.email')
      ->select('dabani_members_.*')
      ->where('status', 1)
      ->where('dabani_members_.email', $user)
      ->get();
  }

  public static function getCurrentUserGroups()
  {
    // Get current user
    if (!Auth::check()) {
      return null;
    }
    $user_id = Auth::getUser()->id;

    return Db::table('user_groups')
      ->join('users_groups', 'user_groups.id', '=', 'users_groups.user_group_id')
      ->select('user_groups.*')
      ->where('users_groups.user_id', $user_id)
      ->get();
  }

  public static function loadAssociates()
  {
    // Get all active members details
    return Db::table('dabani_members_')
      ->join('users', 'users.email', '=', 'dabani_members_.email')
      ->leftJoin('dabani_members_profiles', 'dabani_members_profiles.member_id', '=', 'dabani_members_.id')
      ->select('dabani_members_.*')
      ->where('dabani_members_.status', 1)
      ->orderBy('last_name')
      ->get();
  }

  public static function getAssociates()
  {
    return Member::with('profile.poster', 'user')
      ->where('status', 1)
      ->get();
  }

  public static function getAssociate()
  {
    return Member::with(
      'profile.poster',
      'profile.nationality',
      'studies.level',
      'coachings.training',
      'careers',
      'contact.country',
      'networks',
      'scouting',
      'membership',
      'directors.committee',
      'directors.position',
      'commissions.commission',
      'commissions.position',
      'contributions.event',
      'contributions.cause'
    )
      ->where('status', 1)
      ->get();
  }

  public static function getProfile()
  {
    return Profile::where('status', 1)
      ->with('poster')
      ->first();
  }

  public static function getAllProfiles()
  {
    return Db::table('dabani_members_')
      ->leftJoin('dabani_members_profiles', 'dabani_members_profiles.member_id', '=', 'dabani_members_.id')
      ->select('dabani_members_profiles.*')
      ->where('dabani_members_profiles.status', 1)
      ->get();
  }

  public static function getAllContributions()
  {
    return Db::table('dabani_members_contributions as co')
      ->join('dabani_members_ as me', 'me.id', '=', 'co.member_id')
      ->join('dabani_members_events as ev', 'ev.id', '=', 'co.event_id')
      ->join('dabani_members_causes as ca', 'ca.id', '=', 'co.cause_id')
      ->select('me.last_name as lastname', 'me.first_name as firstname','co.*', 'ev.name AS event', 'ca.name AS cause')
      ->where('co.status', true)
      ->orderByDesc('co.date_of_contribution')
      ->get();
  }

  public static function getCauseContributions()
  {
    return Db::table('dabani_members_contributions')
      ->join('dabani_members_', 'dabani_members_.id', '=', 'dabani_members_contributions.member_id')
      ->join('dabani_members_events', 'dabani_members_events.id', '=', 'dabani_members_contributions.event_id')
      ->join('dabani_members_causes', 'dabani_members_causes.id', '=', 'dabani_members_contributions.cause_id')
      ->groupBy('dabani_members_causes.name')
      ->where('dabani_members_contributions.status', true)
      ->sum('amount');
  }

  public static function getEventContributions()
  {
    return Db::table('dabani_members_contributions')
      ->join('dabani_members_events', 'dabani_members_events.id', '=', 'dabani_members_contributions.event_id')
      ->join('dabani_members_causes', 'dabani_members_causes.id', '=', 'dabani_members_contributions.cause_id')
      ->select('dabani_members_contributions.*', 'dabani_members_events.name AS event', 'dabani_members_causes.name AS cause', Db::raw('SUM(dabani_members_contributions.amount) as total'))
      ->groupBy('event')
      ->where('dabani_members_contributions.status', true)
      ->get();
  }
}
