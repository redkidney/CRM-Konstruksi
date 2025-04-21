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
        Schema::create("process_statuses", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->string("process_status_name");
            $table->integer("phase_id");

            $table->foreign("phase_id")
                ->references("id")
                ->on("phases")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("process_statuses");
    }
};
