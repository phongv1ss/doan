<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('id', 'order_id'); // Đổi tên cột id thành order_id
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('id', 'product_id'); // Đổi tên cột id thành product_id
        });
    }

    
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->renameColumn('order_id', 'id'); // Đổi lại cột order_id thành id
        });

        Schema::table('products', function (Blueprint $table) {
            $table->renameColumn('product_id', 'id'); // Đổi lại cột product_id thành id
        });
    }
};
