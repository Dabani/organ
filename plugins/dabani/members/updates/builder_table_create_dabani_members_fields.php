<?php

namespace Dabani\Members\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersFields extends Migration
{
  public function up()
  {
    Schema::create('dabani_members_fields', function ($table) {
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned();
      $table->string('name', 191);
      $table->string('slug', 191);
      $table->text('description')->nullable();
      $table->boolean('status')->default(1);
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
      $table->timestamp('deleted_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_members_fields');
  }
}