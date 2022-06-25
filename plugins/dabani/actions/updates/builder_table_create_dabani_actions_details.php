<?php namespace Dabani\Actions\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniActionsDetails extends Migration
{
    public function up()
    {
        Schema::create('dabani_actions_details', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('concept_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('organizer', 191);
            $table->text('description')->nullable();
            $table->boolean('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_actions_details');
    }
}
