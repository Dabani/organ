<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersCommittees extends Migration
{
    public function up()
    {
        Schema::table('dabani_members_committees', function($table)
        {
            $table->text('mission')->nullable();
            $table->text('functionality')->nullable();
            $table->string('mandate', 191)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dabani_members_committees', function($table)
        {
            $table->dropColumn('mission');
            $table->dropColumn('functionality');
            $table->dropColumn('mandate');
        });
    }
}
