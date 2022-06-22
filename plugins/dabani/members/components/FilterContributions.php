<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;
use Dabani\Members\Models\Contribution;
use Winter\Storm\Support\Facades\Input;
use Dabani\Members\Models\Member;
use Dabani\Members\Models\Cause;
use Dabani\Members\Models\Event;
use Illuminate\Support\Facades\DB;

class FilterContributions extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Filter Contributions Component',
      'description' => 'Filter contributions'
    ];
  }

  public function onRun()
  {
    $this->contributions = $this->filterContributions();

    $this->total = $this->filterContributions()->sum('amount');

    $this->average = $this->filterContributions()->avg('amount');

    $this->counter = $this->filterContributions()->count();

    $this->maximum = $this->filterContributions()->max('amount');

    $this->minimum = $this->filterContributions()->min('amount');

    $this->contributors = $this->getContributors();

    $this->types = $this->getTypes();

    $this->descriptions = $this->getDescriptions();

    $this -> years = $this->getYears();
  }

  protected function filterContributions()
  {
    //filter by contributor
    $member = Input::get('contributor');

    //filter by type of contribution
    $cause = Input::get('type');

    //filter by description
    $event = Input::get('description');

    //filter by year
    $year = Input::get('year');

    $query = Contribution::with('member', 'event', 'cause')
      ->where('status', true)
      ->get();

    if ($member) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->get();
    }

    if ($cause) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('cause_id', '=', $cause)
        ->get();
    }

    if ($event) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('event_id', '=', $event)
        ->get();
    }

    if ($year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    if ($member && $cause) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->where('cause_id', '=', $cause)
        ->get();
    }

    if ($member && $event) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->where('event_id', '=', $event)
        ->get();
    }

    if ($member && $year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    if ($member && $cause && $year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->where('cause_id', '=', $cause)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    if ($member && $event && $year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->where('event_id', '=', $event)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    if ($member && $cause && $event) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->where('cause_id', '=', $cause)
        ->where('event_id', '=', $event)
        ->get();
    }

    if ($cause && $event) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('cause_id', '=', $cause)
        ->where('event_id', '=', $event)
        ->get();
    }

    if ($cause && $event && $year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('cause_id', '=', $cause)
        ->where('event_id', '=', $event)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    if ($cause && $year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('cause_id', '=', $cause)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    if ($event && $year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('event_id', '=', $event)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    if ($member && $cause && $event && $year) {
      $query = Contribution::with('member', 'event', 'cause')
        ->where('status', true)
        ->where('member_id', '=', $member)
        ->where('cause_id', '=', $cause)
        ->where('event_id', '=', $event)
        ->whereYear('date_of_contribution', '=', $year)
        ->get();
    }

    return $query;
  }

  protected function getContributors()
  {
    $query = Member::where('status',true)
      ->orderBy('last_name')
      ->get();
    return $query;
  }

  protected function getTypes()
  {
    $query = Cause::where('status', true)
      ->orderBy('name')
      ->get();
    return $query;
  }

  protected function getDescriptions()
  {
    $query = Event::where('status', true)
      ->orderBy('name')
      ->get();
    return $query;
  }

  protected function getYears()
  {
    $query = Contribution::where('status', true)
      ->whereNotNull('date_of_contribution')
      ->orderByDesc('date_of_contribution')
      ->distinct()
      ->get([Db::raw('YEAR(date_of_contribution) as year')]);
    return $query;
  }


  public $contributions;
  public $total;
  public $average;
  public $counter;
  public $minimum;
  public $maximum;
  public $contributors;
  public $types;
  public $descriptions;
  public $years;
}
