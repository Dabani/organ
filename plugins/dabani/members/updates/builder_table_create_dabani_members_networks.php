<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersNetworks extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_networks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->string('website', 191)->nullable();
            $table->string('facebook', 191)->nullable();
            $table->string('instagram', 191)->nullable();
            $table->string('linked_in', 191)->nullable();
            $table->string('google_plus', 191)->nullable();
            $table->string('youtube', 191)->nullable();
            $table->string('skype', 191)->nullable();
            $table->string('whatsapp', 191)->nullable();
            $table->string('telegram', 191)->nullable();
            $table->string('tik_tok', 191)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_members_networks');
    }
}
