<?php namespace Dabani\Actions\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniActionsTargets extends Migration
{
    public function up()
    {
        Schema::create('dabani_actions_targets', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('objective_id')->unsigned();
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->text('description')->nullable();
            $table->string('measure', 191);
            $table->string('unity', 191);
            $table->integer('expected')->unsigned();
            $table->integer('released')->unsigned();
            $table->boolean('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_actions_targets');
    }
}
