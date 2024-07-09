<?php

use App\Models\GalleryType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->foreignId('gallery_type_id')->constrained()->onDelete('cascade'); // Add foreign key

        });
        GalleryType::create([
            'title' => 'Gallery Type image',
            'gallery_type_id' => 1,
            'slug' => ''
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropForeign(['gallery_type_id']);
            $table->dropColumn('gallery_type_id');
        });
    }
};
