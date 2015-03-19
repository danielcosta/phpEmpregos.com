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
        \DB::statement("select @sql_mode_tmp := @@sql_mode;");
        \DB::statement("set sql_mode=''");

        Schema::create('job', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('location')->nullable();
            $table->text('description');
            $table->enum('status', ['DRAFT', 'PENDING', 'PUBLISHED', 'REJECTED', 'FILLED']);
            $table->string('contact_email');
            $table->string('email')->nullable();
            $table->string('email_subject_prefix')->nullable();
            $table->string('advertiser_name')->nullable();
            $table->string('advertiser_url')->nullable();
            $table->text('question_1')->nullable();
            $table->text('question_2')->nullable();
            $table->text('question_3')->nullable();
            $table->string('external_id')->nullable();
            $table->datetime('published_at')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->datetime('created_at');
            $table->unique('external_id');
        });

        \DB::statement("set sql_mode=@sql_mode_tmp;");
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

