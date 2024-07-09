<?php

use App\Models\GalleryType;
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
        Schema::table('gallery_types', function (Blueprint $table) {
            GalleryType::create([
                'title' => 'Gallery Type image',
                'gallery_type_id' => 1,
                'slug' => ''
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_types', function (Blueprint $table) {
            //
        });
    }
};
