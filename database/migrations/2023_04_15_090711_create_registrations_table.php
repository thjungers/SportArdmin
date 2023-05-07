<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable()->constrained();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->date('date_of_birth');
            $table->string('address', 255);
            $table->string('phone', 20);
            $table->timestamps();
            $table->date('valid_on');
            $table->date('expires_on');
            $table->json('sections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
