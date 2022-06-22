<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;
use Dabani\Members\Models\Member;
// use Winter\User\Components\Session;

class Members extends ComponentBase
{
  /**
   * Gets the details for the component
   */
  public function componentDetails()
  {
    return [
      'name'        => 'Members',
      'description' => 'No description provided yet...'
    ];
  }

  public function onRun()
  {
    return $this -> members = $this -> loadMembers();
  }

  protected function loadMembers()
  {
    // Session::save();
    return Member::all();
  }

  /**
   * Returns the properties provided by the component
   */
  public function defineProperties()
  {
    return [];
  }

  public $members;
}
