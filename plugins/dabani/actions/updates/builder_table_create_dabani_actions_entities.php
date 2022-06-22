<?php

namespace Dabani\Actions\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniActionsEntities extends Migration
{
  public function up()
  {
    Schema::create('dabani_actions_entities', function ($table) {
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned();
      $table->string('name', 191);
      $table->string('slug', 191);
      $table->text('description')->nullable();
      $table->string('category', 191);
      $table->boolean('status');
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
      $table->timestamp('deleted_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_actions_entities');
  }
}
