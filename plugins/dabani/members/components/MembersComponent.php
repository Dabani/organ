<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;
use Dabani\Members\Models\Member;

class MembersComponent extends ComponentBase
{
  /**
   * Gets the details for the component
   */
  public function componentDetails()
  {
    return [
      'name'        => 'MembersComponent Component',
      'description' => 'No description provided yet...'
    ];
  }

  public function onRun()
  {
    return $this->membersComponent = $this->loadMembersComponent();
  }

  public function loadMembersComponent()
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

  public $membersComponent;
}
