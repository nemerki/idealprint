<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintBanner extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_banner', function($table)
        {
            $table->dropColumn(' link');
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_banner', function($table)
        {
            $table->string(' link', 191)->nullable();
        });
    }
}
