<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersScoutings extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_scoutings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->date('promise_date');
            $table->string('unit_affiliation', 191);
            $table->string('totem', 191)->nullable();
            $table->date('totem_date')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_members_scoutings');
    }
}
