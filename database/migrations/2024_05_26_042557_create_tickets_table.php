<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_tickets_table.php
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_type')->default('technical issues');
            $table->string('subject');
            $table->string('email')->default('support@enetech.my');
            $table->text('equipment');
            $table->integer('quantity');
            $table->string('part_no');
            $table->text('remarks')->nullable();
            $table->text('report_description');
            $table->text('service_details');
            $table->string('attachments')->nullable();
            $table->enum('status', ['submitted', 'verified', 'resolved', 'closed'])->default('submitted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
