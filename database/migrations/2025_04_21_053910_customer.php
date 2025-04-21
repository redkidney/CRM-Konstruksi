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
        Schema::create("customer", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->string("customer_name");
            $table->integer("customer_type_id");

            $table->foreign("customer_type_id")
                ->references("id")
                ->on("customer_types")
                ->onDelete("restrict")
                ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("customer");
    }
};
