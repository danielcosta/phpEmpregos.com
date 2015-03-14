<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('location')->nullable();
            $table->text('description');
            $table->enum('status', ['DRAFT', 'PENDING', 'PUBLISHED', 'REJECTED', 'FILLED']);
            $table->string('contact_email');
            $table->string('email');
            $table->string('email_subject_prefix')->nullable();
            $table->string('advertiser_name')->nullable();
            $table->string('advertiser_url')->nullable();
            $table->text('question_1')->nullable();
            $table->text('question_2')->nullable();
            $table->text('question_3')->nullable();
            $table->string('external_id')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->unique('external_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job');
    }

}

