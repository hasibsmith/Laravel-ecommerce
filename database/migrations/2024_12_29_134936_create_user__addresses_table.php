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
        Schema::create('user__addresses', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");           
            $table->string("firstname");
            $table->string("lastname");
            $table->string("email");
            $table->string("mobileno");
            $table->string("address_line_one");
            $table->string("address_line_two");
            $table->string("country_name");
            $table->string("city_name");
            $table->string("state_name");
            $table->string("size_code");       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user__addresses');
    }
};
