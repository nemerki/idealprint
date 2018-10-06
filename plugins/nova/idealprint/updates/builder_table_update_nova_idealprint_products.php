<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintProducts extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_products', function($table)
        {
            $table->boolean('is_active')->default(1);
            $table->integer('brand_id')->nullable()->unsigned();
            $table->integer('field_id')->nullable()->unsigned();
            $table->increments('id')->unsigned(false)->change();
            $table->string('title')->change();
            $table->string('slug')->change();
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_products', function($table)
        {
            $table->dropColumn('is_active');
            $table->dropColumn('brand_id');
            $table->dropColumn('field_id');
            $table->increments('id')->unsigned()->change();
            $table->string('title', 191)->change();
            $table->string('slug', 191)->change();
        });
    }
}
