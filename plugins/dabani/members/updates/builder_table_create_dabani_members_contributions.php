<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersContributions extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_contributions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->integer('contribution_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->integer('amount')->unsigned();
            $table->string('currency', 191);
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_members_contributions');
    }
}
