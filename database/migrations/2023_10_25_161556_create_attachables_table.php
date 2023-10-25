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
        Schema::create('attachables', function (Blueprint $table) {
            $table->foreignId('attachment_id')->constrained()->cascadeOnDelete();
            $table->morphs('attachmentable');
             $table->unique(['attachment_id', 'attachmentable_id', 'attachmentable_type']);
//            $table->unique(['attachment_id', 'attachmentable_id', 'attachmentable_type'], 'attachmentables_attachment_id_type_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attachables');
    }
};
