<?php

use App\Models\Category;
use App\Models\Provider;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('reference',50)->unique();
            $table->string('name',100)->nullable();
            $table->text('description')->nullable();
            $table->string('size',10)->nullable();
            $table->string('color',30)->nullable();
            $table->decimal('purchase_price',10,2)->default(0);
            $table->decimal('sale_price',10,2)->default(0);
            $table->integer('stock')->default(0);
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Provider::class)->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
