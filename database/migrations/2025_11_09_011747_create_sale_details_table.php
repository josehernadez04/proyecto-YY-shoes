<?php

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->enum('size', ['34', '35', '36', '37', '38', '39', '40', '41', '42', '43'])->nullable();
            $table->integer('quantity')->comment('cantidad de productos en el carrito');
            $table->decimal('price_unit', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->foreignIdFor(Sale::class)->constrained('sales')->onDelete('cascade');
            $table->foreignIdFor(Product::class)->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_details');
    }
};
