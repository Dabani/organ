<?php

namespace Dabani\Members\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersCoachings extends Migration
{
  public function up()
  {
    Schema::create('dabani_members_coachings', function ($table) {
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned();
      $table->integer('member_id')->unsigned();
      $table->integer('training_id')->unsigned();
      $table->string('name', 191);
      $table->text('description')->nullable();
      $table->date('from');
      $table->date('to');
      $table->string('institution', 191);
      $table->boolean('status')->default(0);
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
      $table->timestamp('deleted_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_members_coachings');
  }
}
