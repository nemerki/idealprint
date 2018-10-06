<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintBanner2 extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_banner', function($table)
        {
            $table->string('url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_banner', function($table)
        {
            $table->dropColumn('url');
        });
    }
}
