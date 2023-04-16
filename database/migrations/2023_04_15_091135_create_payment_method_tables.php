<?php

use App\Models\User;
use App\Models\Section;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * Create the fields for all PaymentMethod children
         */
        function payment_method_fields(Blueprint $table) 
        {
            $table->id();
            $table->float('amount_paid');
            $table->string('comment', 255)->nullable()->default('text');
            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
            $table->date('payed_on');
            $table->date('valid_on');
            $table->date('expires_on');
        }

        Schema::create('cards', payment_method_fields(...));
        Schema::create('memberships', payment_method_fields(...));
        Schema::create('subscriptions', payment_method_fields(...));

        /**
         * Create the fields for all SectionPaymentMethod children
         */
        function section_payment_method_fields(Blueprint $table) 
        {
            $table->foreignIdFor(Section::class)->constrained();
        }

        Schema::table('cards', section_payment_method_fields(...));
        Schema::table('subscriptions', section_payment_method_fields(...));

        /**
         * Create the fields that are specific to the Card model
         */
        Schema::table('cards', function (Blueprint $table) {
            $table->integer('number_of_sessions')->unsigned();
            $table->integer('remaining_sessions')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
        Schema::dropIfExists('memberships');
        Schema::dropIfExists('subscriptions');
    }
};
