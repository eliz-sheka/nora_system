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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Label::class, 'label_id');
            $table->foreignIdFor(\App\Models\Discount::class, 'discount_id')->nullable()->onDelete('set null');
            $table->unsignedTinyInteger('uah_per_hour')->nullable();
            $table->unsignedTinyInteger('discount_amount')->nullable();
            $table->string('discount_unit', 10)->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('note')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->unsignedTinyInteger('payment_method')->nullable();
            $table->dateTime('start_time');
            $table->dateTime('end_time')->nullable();
            $table->foreignIdFor(\App\Models\User::class, 'user_id')->nullable();
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
        Schema::dropIfExists('visits');
    }
};
