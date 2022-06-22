<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersDirectors extends Migration
{
    public function up()
    {
        Schema::rename('dabani_members_committees_members', 'dabani_members_directors');
    }
    
    public function down()
    {
        Schema::rename('dabani_members_directors', 'dabani_members_committees_members');
    }
}
