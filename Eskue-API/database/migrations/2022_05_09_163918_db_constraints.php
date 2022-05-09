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
    public function up(): void
    {
        Schema::table('administrative_zones', static function ($table) {
            $table->foreign('parent_id')->references('id')->on('administrative_zones')
                ->nullOnDelete()->cascadeOnUpdate();
        });
        Schema::table('users', static function ($table) {
            $table->foreign('zone_id')->references('id')->on('administrative_zones')
                ->nullOnDelete()->cascadeOnUpdate();
        });
        Schema::table('posts', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('service_id')->references('id')->on('services')
                ->nullOnDelete()->cascadeOnUpdate();
        });
        Schema::table('comments', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('post_id')->references('id')->on('posts')
                ->nullOnDelete()->cascadeOnUpdate();
        });
        Schema::table('likes', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('post_id')->references('id')->on('posts')
                ->nullOnDelete()->cascadeOnUpdate();
        });
        Schema::table('messages', static function ($table) {
            $table->foreign('sender_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('receiver_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
        });
        Schema::table('services', static function ($table) {
            $table->foreign('type_id')->references('id')->on('service_types')
                ->nullOnDelete()->cascadeOnUpdate();
        });
        Schema::table('user_service', static function ($table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('service_id')->references('id')->on('services')
                ->nullOnDelete()->cascadeOnUpdate();
        });
    }
};
