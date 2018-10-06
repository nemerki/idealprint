<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNovaIdealprintColorsProducts extends Migration
{
    public function up()
    {
        Schema::create('nova_idealprint_colors_products', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('color_id');
            $table->integer('product_id');
            $table->primary(['color_id','product_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nova_idealprint_colors_products');
    }
}
