<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;
use Dabani\Members\Models\Contribution;
use Dabani\Members\Models\Member;
use Illuminate\Support\Facades\DB;
use Winter\User\Facades\Auth;

class Associate extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Associate Item',
      'description' => 'Associate full details'
    ];
  }

  public function onRun()
  {
    // Get current user
    if (!Auth::check()) {
      return null;
    }

    $user_id = Auth::getUser()->id;

    // Get current allowed user groups
    $this ->groups = Db::table('user_groups')
    ->join('users_groups', 'user_groups.id', '=', 'users_groups.user_group_id')
    ->select('user_groups.code')
    ->where('users_groups.user_id', $user_id)
    ->where('user_groups.code', 'board')
    ->get();

    $this->associate = Member::getAssociate()
      ->where('id', $this ->param('id'))
      ->first();

    $this->contributions = $this->getContributions()
      ->where('member_id', $this->param('id'))
      ->all();

    $this->allContributions = Member::getAllContributions()->all();

    $this->causeContributions = $this -> loadCauseContributions();

    $this->total = $this -> loadSum();

    $this->average = $this->loadAverage();

    $this -> counter = $this -> loadCounter();
  }

  protected function getContributions()
  {
    $query = Contribution::where('status', true)
      ->orderBy('date_of_contribution','desc')
      ->get();

    return $query;
  }

  protected function loadCauseContributions()
  {

    $query = DB::query()
    ->select(
      'co.currency AS currency',
    )
    ->where('co.member_id', $this->param('id'))
    ->selectRaw('SUM(co.amount) AS amount') // need to use selectRaw for aggregate values like this.
    ->from('dabani_members_contributions', 'co')
    ->join('dabani_members_causes as ca', 'ca.id', 'co.cause_id')
    ->join('dabani_members_ as m', 'm.id', 'co.member_id')
    ->groupBy('ca.name')
    ->get();

      return $query;
  }

  protected function loadSum()
  {

    // Get Member Contributions Total
    $total = Contribution::where('member_id', $this->param('id'))
      ->sum('amount');

    return $total;
  }

  protected function loadAverage()
  {
    // Get Member Contributions Average
    $query = Db::table('dabani_members_contributions')
    ->where('member_id', $this->param('id'))
    ->avg('amount');

    return $query;
  }

  protected function loadCounter()
  {
    // Get Member Contributions Counter
    $query = Db::table('dabani_members_contributions')
    ->where('member_id', $this->param('id'))
    ->count();

    return $query;
  }

  public $associate;
  public $contributions;
  public $allContributions;
  public $causeContributions;
  public $total;
  public $average;
  public $counter;
}
