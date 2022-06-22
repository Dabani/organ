<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;
use Dabani\Members\Models\Member;


class Associates extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Associate List',
      'description' => 'List of associates'
    ];
  }

  public function onRun()
  {
    $this->groups = Member::getCurrentUserGroups();
    $this->associates = Member::getAssociates();
    $this->details = Member::getMemberDetails();
    $this->profile = Member::getProfile();
    $this->profiles = Member::getAllProfiles();
  }

  public $associates;
  public $groups;
  public $details;
  public $profile;
  public $profiles;
}
