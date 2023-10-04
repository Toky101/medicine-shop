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

        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('m_name');
            $table->string('m_slug');
            $table->string('m_description');
            $table->string('m_price');
            $table->string('m_image')->nullable();
            $table->string('m_quantity');
            // $table->foreignId('manufacturer_id')->constrained('manufacturers')->onDelete('cascade');
            $table->timestamps();
            $table->integer('m_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
