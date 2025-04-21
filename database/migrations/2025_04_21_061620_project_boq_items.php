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
        Schema::create("project_boq_items", function (Blueprint $table) {
            $table->id();
            $table->integer("project_id");
            $table->integer("project_location_id");
            $table->integer("designator_id");
            $table->decimal("unit_price_material_upstream", 15, 2);
            $table->decimal("unit_price_service_upstream", 15, 2);
            $table->decimal("unit_price_material_downstream", 15, 2);
            $table->decimal("unit_price_service_downstream", 15, 2);
            $table->integer("qty");
            $table->decimal("total_price_material_upstream", 15, 2);
            $table->decimal("total_price_service_upstream", 15, 2);
            $table->decimal("total_price_material_downstream", 15, 2);
            $table->decimal("total_price_service_downstream", 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("project_boq_items");
    }
};
