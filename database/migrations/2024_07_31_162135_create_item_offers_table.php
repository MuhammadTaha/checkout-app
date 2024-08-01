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
        Schema::create('item_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('items_id');
            $table->string('title');
            $table->integer('quantity');
            $table->float('price', 2);
            $table->timestamps();


        });

        Schema::table('item_offers', function (Blueprint $table) {
            $table->foreign('items_id')->references('id')->on('items')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_offers', function (Blueprint $table) {
            $table->dropForeign(['items_id']);
            $table->dropIfExists('item_offers');
        });
    }
};
