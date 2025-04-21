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
        Schema::create("approval_steps", function (Blueprint $table) {
            $table->id();
            $table->string("approval_step_name");
            $table->integer("approval_group_id");
            $table->unsignedBigInteger("approval_user_id")->nullable();
            $table->string("step_order");
            $table->boolean("is_last_step");

            $table->foreign("approval_group_id")
                ->references("id")
                ->on("approval_group_settings")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            $table->foreign("approval_user_id")
                ->references("id")
                ->on("users")
                ->onDelete("cascade")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("approval_steps");
    }
};
