<?php

namespace Dabani\Members\Components;

use Cms\Classes\ComponentBase;
use Dabani\Members\Models\Career;


class Careers extends ComponentBase
{
  public function componentDetails()
  {
    return [
      'name' => 'Career List',
      'description' => 'List of careers'
    ];
  }

  public function onRun()
  {
    $this -> careers = $this -> loadCareers();
  }

  protected function loadCareers()
  {
    return Career::all();
  }

  public $careers;
}
