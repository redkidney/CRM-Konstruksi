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
        Schema::create("phases", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->string("phase_name");
            $table->integer("phase_order");
            $table->integer("phase_group_id");
            $table->boolean("is_last_phase");
            $table->string("phase_sys_name");
            $table->string("creator");
            $table->integer("approval_setting_id");
            $table->integer("active_status_id");

            $table->foreign("phase_group_id")
                  ->references("id")
                  ->on("phase_groups")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");

            $table->foreign("approval_setting_id")
                  ->references("id")
                  ->on("approval_group_settings")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");

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
        Schema::dropIfExists("phases");
    }
};
