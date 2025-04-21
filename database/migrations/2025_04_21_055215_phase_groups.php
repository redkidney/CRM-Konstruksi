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
        Schema::create("phase_groups", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->string("name");
            $table->integer("active_status_id");

            $table->foreign("active_status_id")
                ->references("id")
                ->on("active_statuses")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("phase_groups");
    }
};
