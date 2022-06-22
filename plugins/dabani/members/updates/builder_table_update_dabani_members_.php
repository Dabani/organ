<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembers extends Migration
{
    public function up()
    {
        Schema::table('dabani_members_', function($table)
        {
            $table->integer('user_id')->unsigned()->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('dabani_members_', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
