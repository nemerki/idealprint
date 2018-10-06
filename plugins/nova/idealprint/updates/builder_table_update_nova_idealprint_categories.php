<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintCategories extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_categories', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_categories', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
