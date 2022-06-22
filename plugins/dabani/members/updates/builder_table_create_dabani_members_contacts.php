<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersContacts extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_contacts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('province', 191)->nullable();
            $table->string('city', 191)->nullable();
            $table->string('village', 191)->nullable();
            $table->string('street', 191)->nullable();
            $table->string('telephone', 191);
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_members_contacts');
    }
}
