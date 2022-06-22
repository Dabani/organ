<?php

namespace Dabani\Members\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersProfile extends Migration
{
  public function up()
  {
    Schema::create('dabani_members_profile', function ($table) {
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned();
      $table->integer('member_id')->unsigned();
      $table->string('gender', 1);
      $table->integer('country_id')->unsigned();
      $table->string('id_passport', 191);
      $table->date('date_of_birth');
      $table->string('place_of_birth', 191);
      $table->string('photo', 191)->nullable();
      $table->boolean('status')->default(0);
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
      $table->timestamp('deleted_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_members_profile');
  }
}
