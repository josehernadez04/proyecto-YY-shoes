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
            $table->string('referencia',50)->unique();
            $table->string('nombre',100)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('talla',10)->nullable();
            $table->string('color',30)->nullable();
            $table->decimal('precio_compra',10,2)->default(0);
            $table->decimal('precio_venta',10,2)->default(0);
            $table->integer('stock')->default(0);
            $table->integer('categoria_id');
            $table->integer('proveedor_id');
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
