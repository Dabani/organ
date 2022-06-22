<?php

namespace Dabani\Members\Updates;

use Winter\Storm\Support\Facades\Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersProfiles extends Migration
{
    public function up()
    {
        Schema::rename('dabani_members_profile', 'dabani_members_profiles');
    }

    public function down()
    {
        Schema::rename('dabani_members_profiles', 'dabani_members_profile');
    }
}
