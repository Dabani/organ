<?php namespace Dabani\Actions\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniActionsConcepts extends Migration
{
    public function up()
    {
        Schema::create('dabani_actions_concepts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('activity_id')->unsigned();
            $table->text('summary')->nullable();
            $table->text('problem')->nullable();
            $table->text('beneficiaries')->nullable();
            $table->text('goal')->nullable();
            $table->text('outcomes')->nullable();
            $table->text('timeline')->nullable();
            $table->text('approach')->nullable();
            $table->text('monitoring')->nullable();
            $table->integer('cost')->nullable();
            $table->string('currency', 191)->nullable();
            $table->text('activities')->nullable();
            $table->text('partners')->nullable();
            $table->text('sustainability')->nullable();
            $table->boolean('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_actions_concepts');
    }
}
