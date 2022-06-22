<?php

namespace Dabani\Members\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembers extends Migration
{
  public function up()
  {
    Schema::create('dabani_members_', function ($table) {
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned();
      $table->string('first_name', 191);
      $table->string('last_name', 191);
      $table->string('email', 191);
      $table->boolean('status')->default(0);
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
      $table->timestamp('deleted_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_members_');
  }
}
