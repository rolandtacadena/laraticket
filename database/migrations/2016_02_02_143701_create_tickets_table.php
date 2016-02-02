<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('backlog_id')->unsigned();
            $table->foreign('backlog_id')
                ->references('id')
                ->on('backlogs')
                ->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->enum('type', ['bug', 'task'])->default('bug');
            $table->enum('priority', ['high', 'medium', 'low'])->default('low');
            $table->enum('status', ['open', 'close'])->default('open');
            $table->integer('dev_loe')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}
