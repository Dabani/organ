<?php

namespace Dabani\Members\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersDepartments extends Migration
{
  public function up()
  {
    Schema::create('dabani_members_departments', function ($table) {
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned();
      $table->string('name', 191);
      $table->string('slug', 191);
      $table->integer('field_id')->unsigned();
      $table->boolean('status')->default(1);
      $table->text('description')->nullable();
      $table->timestamp('created_at')->nullable();
      $table->timestamp('updated_at')->nullable();
      $table->timestamp('deleted_at')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('dabani_members_departments');
  }
}
