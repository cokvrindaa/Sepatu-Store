<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shoes', function (Blueprint $table) {
            $table->renameColumn('thubnail', 'description');
        });

        Schema::table('shoes', function (Blueprint $table) {
            $table->string('thumbnail')->after('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shoes', function (Blueprint $table) {
            $table->dropColumn('thumbnail');
            $table->renameColumn('description', 'thubnail');
        });
    }
};
