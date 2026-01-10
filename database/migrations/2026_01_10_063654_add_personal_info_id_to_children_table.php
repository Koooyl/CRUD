<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('children', function (Blueprint $table) {
            $table->foreignId('personal_info_id')
                  ->after('id')
                  ->constrained()
                  ->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::table('children', function (Blueprint $table) {
            $table->dropForeign(['personal_info_id']);
            $table->dropColumn('personal_info_id');
        });
    }
};
