<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersEvents extends Migration
{
    public function up()
    {
        Schema::table('dabani_members_events', function($table)
        {
            $table->string('venue', 191);
            $table->time('time');
        });
    }
    
    public function down()
    {
        Schema::table('dabani_members_events', function($table)
        {
            $table->dropColumn('venue');
            $table->dropColumn('time');
        });
    }
}
