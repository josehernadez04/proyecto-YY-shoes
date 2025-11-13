<?php

use App\Models\type_documents;
use App\Models\TypeDocument;
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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('documento',20)->unique();
            $table->string('nombre',100)->nullable();
            $table->string('phone',  20)->nullable();
            $table->string('adress',150)->nullable();
            $table->string('email',100)->nullable();
            $table->foreignIdFor(TypeDocument::class)->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('providers');
    }
};
