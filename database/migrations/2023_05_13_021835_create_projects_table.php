<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('developer_id')->unsigned();
            $table->bigInteger('community_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('banner')->nullable();
            $table->longtext('logo')->nullable();
            $table->string('property_type')->nullable();
            $table->string('property_sub_type')->nullable();
            $table->string('unit_type')->nullable();
            $table->string('plot_size')->nullable();
            $table->string('built_up_area')->nullable();
            $table->string('handover')->nullable();
            $table->string('payment_plan')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('status')->nullable();
            $table->longtext('meta_title')->nullable();
            $table->longtext('meta_tags')->nullable();
            $table->longtext('meta_keywords')->nullable();
            $table->longtext('meta_description')->nullable();
            $table->timestamps();

            $table->foreign('developer_id')
            ->references('id')
            ->on('developers')
            ->onDelete('cascade');

            $table->foreign('community_id')
            ->references('id')
            ->on('communities')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
