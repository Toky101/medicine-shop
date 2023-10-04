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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('o_total_price')->nullable();
            $table->string('o_address');
            $table->string('o_phone');
            $table->string('o_status');
            $table->string('o_note')->nullable();
            $table->string('o_payment_method');
            $table->string('o_payment_status');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            // $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
