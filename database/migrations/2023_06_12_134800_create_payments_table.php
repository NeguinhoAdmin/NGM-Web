<?php

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('registration');
            $table->string('payment_type');
            $table->decimal('rental_deposit', 8, 2);
            $table->decimal('rental_price', 8, 2);
            $table->text('description');
            $table->decimal('received', 8, 2);
            $table->decimal('outstanding', 8, 2);
            $table->longText('notes');
            $table->dateTime('payment_due_date');
            $table->bigInteger('payment_due_count');
            $table->dateTime('payment_next_date');
            $table->dateTime('payment_date');
            $table->string('paid');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->string('auth_user');
            $table->dateTime('deleted_at');
            $table->string('deleted_by');
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
        Schema::dropIfExists('payments');
    }
};
