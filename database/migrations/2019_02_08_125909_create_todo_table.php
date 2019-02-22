<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // todoの件名カラム
            $table->dateTime('deadline');  // todoの締め切りカラム
            $table->integer('importance'); // 重要度カラム
            $table->dateTime('processingschedule');  // 実際の処理日カラム
            $table->string('content'); // 内容カラム
            $table->integer('group_id'); // グループ分類カラム

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo');
    }
}
