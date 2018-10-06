<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintProducts3 extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_products', function($table)
        {
            $table->boolean('is_recommend')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_products', function($table)
        {
            $table->dropColumn('is_recommend');
        });
    }
}
