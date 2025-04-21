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
        Schema::create("project_attachments", function (Blueprint $table) {
            $table->id();
            $table->integer("project_id");
            $table->integer("document_type_id");
            $table->string("document_filename");
            $table->string("document_path");
            $table->timestamp("document_upload");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("project_attachments");
    }
};
