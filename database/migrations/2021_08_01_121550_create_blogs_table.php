<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     * 実行(作成) テーブルを作成
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('blogs')) {
            Schema::create('blogs', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title', 100);   // 追加
                $table->text('content');        // 追加
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     * 元に戻す(削除)
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
