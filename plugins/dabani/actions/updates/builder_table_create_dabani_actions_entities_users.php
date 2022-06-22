<?php

namespace Dabani\Actions\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniActionsEntitiesUsers extends Migration
{
  public function up()
  {
    Schema::create('dabani_actions_entities_users', function ($table) {
      $table->engine = 'InnoDB';
      $table->integer('entity_id')->unsigned();
      $table->integer('user_id')->unsigned();
      $table->primary(['entity_id', 'user_id']);
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_actions_entities_users');
  }
}
