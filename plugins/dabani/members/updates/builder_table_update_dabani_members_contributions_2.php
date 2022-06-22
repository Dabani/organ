<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersContributions2 extends Migration
{
    public function up()
    {
        Schema::table('dabani_members_contributions', function($table)
        {
            $table->renameColumn('contribution_id', 'cause_id');
        });
    }
    
    public function down()
    {
        Schema::table('dabani_members_contributions', function($table)
        {
            $table->renameColumn('cause_id', 'contribution_id');
        });
    }
}
