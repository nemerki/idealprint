<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintNews extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_news', function($table)
        {
            $table->boolean('is_home')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_news', function($table)
        {
            $table->dropColumn('is_home');
        });
    }
}
