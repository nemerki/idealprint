<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNovaIdealprintCategoriesGroups2 extends Migration
{
    public function up()
    {
        Schema::table('nova_idealprint_categories_groups', function($table)
        {
            $table->dropPrimary(['category_id','group_id']);
            $table->integer('cartegory_id')->unsigned();
            $table->integer('group_id')->unsigned()->change();
            $table->dropColumn('category_id');
            $table->primary(['cartegory_id','group_id']);
        });
    }
    
    public function down()
    {
        Schema::table('nova_idealprint_categories_groups', function($table)
        {
            $table->dropPrimary(['cartegory_id','group_id']);
            $table->dropColumn('cartegory_id');
            $table->integer('group_id')->unsigned(false)->change();
            $table->integer('category_id');
            $table->primary(['category_id','group_id']);
        });
    }
}
