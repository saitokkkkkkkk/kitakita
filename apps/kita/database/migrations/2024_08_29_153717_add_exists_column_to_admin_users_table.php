<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            // 既存のユニーク制約を削除
            $table->dropUnique(['email']);

            // 生成列の追加
            $table->boolean('exist')->nullable()->storedAs('case when deleted_at is null then 1 else null end');

            // 複合ユニーク制約にする
            $table->unique(['email', 'exist']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_users', function (Blueprint $table) {
            // 複合ユニーク制約の解除
            $table->dropUnique(['email', 'exist']);

            // 生成列の削除
            $table->dropColumn('exist');

            // 元のユニーク制約（emailのみの単独のユニーク制約）の再作成
            $table->unique('email');
        });
    }
};
