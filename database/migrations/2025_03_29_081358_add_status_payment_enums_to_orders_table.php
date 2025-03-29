<?php

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['cart_id']);
            $table->dropColumn('cart_id');
            $table->enum('payment_method', PaymentMethod::values())
                ->default(PaymentMethod::Cash->value)
                ->after('price');
            $table->enum('status', OrderStatus::values())
                ->default(OrderStatus::Sent->value)
                ->after('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('cart_id')->after('user_id')->constrained()->cascadeOnDelete();
            $table->dropColumn('payment_method');
            $table->dropColumn('status');
        });
    }
};
