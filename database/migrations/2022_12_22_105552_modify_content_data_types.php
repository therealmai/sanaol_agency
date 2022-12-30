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
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('content');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('content');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('content');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->longText('content');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->longText('content');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->longText('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('content');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('content');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('content');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->string('content');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('content');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('content');
        });
    }
};
