<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_education', function (Blueprint $table) {
            $table->string('photo')->after('year')->nullable();
        });
        Schema::table('seller_experiences', function (Blueprint $table) {
            $table->string('photo')->after('designation')->nullable();
        });
        Schema::table('seller_registrations', function (Blueprint $table) {
            $table->string('photo')->after('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_education', function (Blueprint $table) {
            $table->dropColumn(['photo']);
        });
        Schema::table('seller_experiences', function (Blueprint $table) {
            $table->dropColumn(['photo']);
        });
        Schema::table('seller_registrations', function (Blueprint $table) {
            $table->dropColumn(['photo']);
        });
    }
}
