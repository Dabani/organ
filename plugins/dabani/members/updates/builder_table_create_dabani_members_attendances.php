<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersAttendances extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_attendances', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('event_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->primary(['event_id','member_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_members_attendances');
    }
}
