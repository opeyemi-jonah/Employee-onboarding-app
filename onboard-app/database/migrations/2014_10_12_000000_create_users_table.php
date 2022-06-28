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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('middle_name',100)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('username')->unique();
            $table->string('profile_picture',100)->nullable();
            $table->dateTime('registeredAt')->default(new DateTime());
            $table->string('phone_number', 11)->nullable();
            $table->longText('bio')->nullable()->default('text');
            $table->date('date_of_birth')->nullable();

            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');

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
};
