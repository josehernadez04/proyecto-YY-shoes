<?php

use App\Models\TypeDocument;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->string('document',20)->unique();
            $table->string('email',100)->unique();
            $table->string('phone',20)->nullable();
            $table->string('address',255)->nullable();
            $table->string('birthdate',255)->nullable();
            $table->string('password',255);
            $table->rememberToken()->nullable();
            $table->foreignIdFor(TypeDocument::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
