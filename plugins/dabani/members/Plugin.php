<?php

namespace Dabani\Members;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

  public function registerComponents()
  {
    return [
      'Dabani\Members\Components\Associates'        => 'associates',
      'Dabani\Members\Components\Associate'         => 'associate',
      'Dabani\Members\Components\Careers'           => 'careers',
      'Dabani\Members\Components\Contributors'      => 'contributors',
      'Dabani\Members\Components\FilterContributions'      => 'filterContributions'
    ];
  }

  public function registerSettings()
  {
  }

}
