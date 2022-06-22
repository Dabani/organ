<?php namespace Dabani\Actions\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniActionsMaterialsTasks extends Migration
{
    public function up()
    {
        Schema::create('dabani_actions_materials_tasks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('material_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->integer('quantity')->unsigned();
            $table->string('unity', 191);
            $table->integer('cost')->unsigned();
            $table->string('currency', 191);
            $table->boolean('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_actions_materials_tasks');
    }
}
