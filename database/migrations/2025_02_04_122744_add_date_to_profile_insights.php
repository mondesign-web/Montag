<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToProfileInsights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profile_insights', function (Blueprint $table) {
            $table->date('date')->nullable()->after('profile_id');
        });

        // Mettre à jour les enregistrements existants avec la date de création
        DB::statement('UPDATE profile_insights SET date = DATE(created_at)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_insights', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
}
