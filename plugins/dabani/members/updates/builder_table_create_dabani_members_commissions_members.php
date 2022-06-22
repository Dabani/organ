<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersCommissionsMembers extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_commissions_members', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('commission_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->date('from');
            $table->date('to')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_members_commissions_members');
    }
}
