<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintCategoriesGroups extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_categories_groups', function($table)
        {
            $table->integer('category_id')->nullable(false)->change();
            $table->integer('group_id')->nullable(false)->change();
            $table->dropColumn('id');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
            $table->primary(['category_id','group_id']);
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_categories_groups', function($table)
        {
            $table->dropPrimary(['category_id','group_id']);
            $table->integer('category_id')->nullable()->change();
            $table->integer('group_id')->nullable()->change();
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
}
