<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersContributions extends Migration
{
    public function up()
    {
        Schema::table('dabani_members_contributions', function($table)
        {
            $table->date('date_of_contribution');
        });
    }
    
    public function down()
    {
        Schema::table('dabani_members_contributions', function($table)
        {
            $table->dropColumn('date_of_contribution');
        });
    }
}
