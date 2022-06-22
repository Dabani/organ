<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableCreateDabaniMembersSkillsMembers extends Migration
{
    public function up()
    {
        Schema::create('dabani_members_skills_members', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('skill_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->primary(['skill_id','member_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dabani_members_skills_members');
    }
}
