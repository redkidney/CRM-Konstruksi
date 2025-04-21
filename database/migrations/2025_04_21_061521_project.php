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
        Schema::create("project", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->string("project_name");
            $table->string("project_description");
            $table->integer("project_type_id");
            $table->integer("portfolio_id");
            $table->integer("customer_id");
            $table->integer("status_id");
            $table->date("project_due_date");
            $table->decimal("margin", 15, 2);
            $table->decimal("margin_percentage", 5, 2);
            $table->integer("phase_id");
            $table->unsignedBigInteger("current_step_id");
            $table->unsignedBigInteger("previous_step_id");
            $table->integer("process_status_id");

            // Foreign key constraints
            $table->foreign("project_type_id")
                  ->references("id")
                  ->on("project_types")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("portfolio_id")
                  ->references("id")
                  ->on("portfolios")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("customer_id")
                  ->references("id")
                  ->on("customer")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("status_id")
                  ->references("id")
                  ->on("status")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("phase_id")
                  ->references("id")
                  ->on("phases")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("current_step_id")
                  ->references("id")
                  ->on("approval_steps")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("previous_step_id")
                  ->references("id")
                  ->on("approval_steps")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");
            $table->foreign("process_status_id")
                  ->references("id")
                  ->on("process_statuses")
                  ->onDelete("cascade")
                  ->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("project");
    }
};
