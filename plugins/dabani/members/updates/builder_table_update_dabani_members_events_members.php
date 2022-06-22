<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersEventsMembers extends Migration
{
    public function up()
    {
        Schema::rename('dabani_members_attendances', 'dabani_members_events_members');
    }
    
    public function down()
    {
        Schema::rename('dabani_members_events_members', 'dabani_members_attendances');
    }
}
