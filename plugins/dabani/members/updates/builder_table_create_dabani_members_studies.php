<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersStudies extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_studies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->integer('level_id')->unsigned();
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
        Schema::dropIfExists('dabani_members_studies');
    }
}
