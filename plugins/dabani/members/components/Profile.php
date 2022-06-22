<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;

class Profile extends ComponentBase
{
  /**
   * Gets the details for the component
   */
  public function componentDetails()
  {
    return [
      'name'        => 'Profile Component',
      'description' => 'No description provided yet...'
    ];
  }

  /**
   * Returns the properties provided by the component
   */
  public function defineProperties()
  {
    return [];
  }
}
