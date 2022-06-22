<?php

namespace Dabani\Actions\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniActionsTasks extends Migration
{
  public function up()
  {
    Schema::create('dabani_actions_tasks', function ($table) {
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned();
      $table->integer('activity_id')->unsigned();
      $table->integer('entity_id')->unsigned();
      $table->string('name', 191);
      $table->string('slug', 191);
      $table->text('description')->nullable();
      $table->string('priority', 191);
      $table->string('phase', 191);
      $table->integer('progress')->unsigned();
      $table->dateTime('start');
      $table->dateTime('end');
      $table->integer('duration')->unsigned();
      $table->string('unity', 191);
      $table->integer('cost')->unsigned();
      $table->string('currency', 191);
      $table->boolean('status');
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
      $table->timestamp('deleted_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_actions_tasks');
  }
}
