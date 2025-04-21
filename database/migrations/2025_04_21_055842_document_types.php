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
        Schema::create("document_types", function (Blueprint $table) {
            $table->integer("id")->primary();
            $table->integer("phase_id");
            $table->string("document_name");
            $table->string("document_sys_name");
            $table->string("document_order");
            $table->boolean("is_mandatory");
            $table->string("upload_path");
            $table->string("allowed_types");
            $table->integer("max_size");
            // $table->integer("document_template_id");
            $table->string("proces_type");
            $table->boolean("use_digital_stamp");
            $table->boolean("use_digital_sign");
            $table->string("digital_signature");
            $table->integer("active_status_id");

            $table->foreign("phase_id")
                ->references("id")
                ->on("phases")
                ->onDelete("cascade")
                ->onUpdate("cascade");
            // $table->foreign("document_template_id")
            //         ->references("id")
            //         ->on("document_templates")
            //         ->onDelete("cascade")
            //         ->onUpdate("cascade");
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
        Schema::dropIfExists("document_types");
    }
};
