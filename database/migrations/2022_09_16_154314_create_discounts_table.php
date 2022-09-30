<?php

declare(strict_types=1);

use App\Models\Discount;
use App\Models\User;
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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('amount');
            $table->string('unit', 10)->default(Discount::UNIT_PERCENT);
            $table->unsignedSmallInteger('quantity')->nullable();
            $table->dateTime('active_till')->nullable();
            $table->foreignIdFor(User::class, 'user_id')->nullable()->onDelete('set null');
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
        Schema::dropIfExists('discounts');
    }
};
