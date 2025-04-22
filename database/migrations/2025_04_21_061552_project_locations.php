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
        Schema::create("project_locations", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("project_id");
            $table->string("province");
            $table->string("city");
            $table->string("address");
            $table->decimal("margin", 15, 2);
            $table->decimal("margin_percentage", 5, 2);
            $table->string("package")->nullable();

            $table->foreign("project_id")
                ->references("id")
                ->on("project")
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
        Schema::dropIfExists("project_locations");
    }
};
