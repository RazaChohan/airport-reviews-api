<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('airport_id')->nullable()->unsigned();
            $table->integer('author_id')->nullable()->unsigned();
            $table->integer('type_traveller_id')->nullable()->unsigned();
            $table->integer('airport_experience_id')->nullable()->unsigned();
            $table->date('review_date')->nullable();
            $table->text('content')->nullable();
            $table->date('date_visit')->nullable();
            $table->decimal('overall_rating', 5, 2);
            $table->decimal('queuing_rating', 5, 2);
            $table->decimal('terminal_cleanliness_rating', 5, 2);
            $table->decimal('terminal_seating_rating', 5, 2);
            $table->decimal('terminal_signs_rating', 5, 2);
            $table->decimal('food_beverages_rating', 5, 2);
            $table->decimal('airport_shopping_rating',5, 2);
            $table->decimal('wifi_connectivity_rating', 5, 2);
            $table->decimal('airport_staff_rating', 5, 2);
            $table->boolean('recommended');
        });
        Schema::table('reviews', function($table){
            $table->foreign('type_traveller_id')
                ->references('id')->on('traveller_types');

            $table->foreign('airport_experience_id')
                ->references('id')->on('airport_experiences');

            $table->foreign('airport_id')
                ->references('id')->on('airports');

            $table->foreign('author_id')
                ->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
