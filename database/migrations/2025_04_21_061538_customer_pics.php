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
        Schema::create("customer_pics", function (Blueprint $table) {
            $table->id();
            $table->integer("project_id");
            $table->string("pic_name");
            $table->string("pic_phone");
            $table->string("pic_email");
            $table->string("pic_position");

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
        Schema::dropIfExists("customer_pics");
    }
};
