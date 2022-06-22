<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;
use Dabani\Members\Models\Contribution;
use Illuminate\Support\Facades\DB;

class Contributors extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Contributors List',
      'description' => 'List of all events contributions'
    ];
  }

  public function onRun()
  {
    $this -> contributors = $this -> loadContributors();

    $this->total = $this->loadSum();

    $this->average = $this->loadAverage();

    $this->counter = $this->loadCounter();
  }

  protected function loadContributors()
  {
    return Contribution::with('member','event','cause')
      ->where('status', true)
      ->orderByDesc('date_of_contribution')
      ->get();
  }

  protected function loadSum()
  {

    // Get Member Contributions Total
    $total = Contribution::where('status', true)
    ->sum('amount');

    return $total;
  }

  protected function loadAverage()
  {
    // Get Member Contributions Average
    $query = Db::table('dabani_members_contributions')
    ->where('status', true)
    ->avg('amount');

    return $query;
  }

  protected function loadCounter()
  {
    // Get Member Contributions Counter
    $query = Db::table('dabani_members_contributions')
    ->where('status', true)
    ->count();

    return $query;
  }

  public $contributors;
  public $total;
  public $average;
  public $counter;
}
