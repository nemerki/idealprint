<?php namespace Nova\Idealprint\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNovaIdealprintProducts extends Migration
{
    public function up()
    {
        Schema::create('nova_idealprint_products', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('cartegory_id')->nullable()->unsigned();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nova_idealprint_products');
    }
}
