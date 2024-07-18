<?php

use App\Models\Job;
use App\Models\Tag;
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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_listing_tag', function (Blueprint $table) {
            $table->id();
            // automatic mag-aadd ng foreign key na id sa row ng table na to galing sa Job model
            // pag na delete na yung foreign key na id sa parent table(Job Model), madedelete na rin yung row sa table na to
            $table->foreignIdFor(Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_listing_tag');
        // php artisan migrate:rollback, para ma undo yung huling migration
    }
};