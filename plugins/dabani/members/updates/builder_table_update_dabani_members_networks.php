<?php namespace Dabani\Members\Updates;

use Schema;
use Winter\Storm\Database\Updates\Migration;

class BuilderTableUpdateDabaniMembersNetworks extends Migration
{
    public function up()
    {
        Schema::table('dabani_members_networks', function($table)
        {
            $table->string('name', 191);
            $table->string('social_media_id', 191);
            $table->string('url', 191);
            $table->boolean('status')->default(1)->change();
            $table->dropColumn('website');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('linked_in');
            $table->dropColumn('google_plus');
            $table->dropColumn('youtube');
            $table->dropColumn('skype');
            $table->dropColumn('whatsapp');
            $table->dropColumn('telegram');
            $table->dropColumn('tik_tok');
        });
    }
    
    public function down()
    {
        Schema::table('dabani_members_networks', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('social_media_id');
            $table->dropColumn('url');
            $table->boolean('status')->default(0)->change();
            $table->string('website', 191)->nullable();
            $table->string('facebook', 191)->nullable();
            $table->string('instagram', 191)->nullable();
            $table->string('linked_in', 191)->nullable();
            $table->string('google_plus', 191)->nullable();
            $table->string('youtube', 191)->nullable();
            $table->string('skype', 191)->nullable();
            $table->string('whatsapp', 191)->nullable();
            $table->string('telegram', 191)->nullable();
            $table->string('tik_tok', 191)->nullable();
        });
    }
}
