<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('children', function (Blueprint $table) {
        $table->boolean('is_not_applicable')
              ->default(false)
              ->after('date_of_birth');
    });
}

public function down()
{
    Schema::table('children', function (Blueprint $table) {
        $table->dropColumn('is_not_applicable');
    });
}

};
