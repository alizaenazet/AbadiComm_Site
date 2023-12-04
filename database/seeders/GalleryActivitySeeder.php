<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GalleryActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageUrl = [
            'https://source.unsplash.com/800x800/?party',
            'https://source.unsplash.com/800x800/?event',
            'https://source.unsplash.com/800x800/?festival',
            'https://source.unsplash.com/800x800/?concert',
            'https://source.unsplash.com/800x800/?corporate-event',
            'https://source.unsplash.com/800x800/?seminar'
        ];

        // Foto Dokumentasi Event Pernikahan
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://plus.unsplash.com/premium_photo-1664478104766-ff7d6ff32af3?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto pengantin sedang berciuman di pelaminan',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1517457373958-b7bdd4587205?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto keluarga pengantin sedang berfoto bersama',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1559223607-a43c990c692c?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto tamu undangan sedang menari di pesta pernikahan',
]);

// Foto Dokumentasi Event Ulang Tahun
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1559223607-b4d0555ae227?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto ulang tahun anak yang sedang meniup lilin',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1561489401-fc2876ced162?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto keluarga sedang merayakan ulang tahun bersama',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://plus.unsplash.com/premium_photo-1665413642520-ebe79e961a4a?q=80&w=2942&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto teman-teman sedang memberikan kado ulang tahun',
]);

// Foto Dokumentasi Event Seminar
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto pembicara sedang memberikan presentasi di seminar',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1638132704795-6bb223151bf7?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto peserta seminar sedang mengikuti diskusi',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1550177977-ad69e8f3cae0?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto peserta seminar sedang berfoto bersama pembicara',
]);

// Foto Dokumentasi Event Konser Musik
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto penonton sedang bernyanyi bersama di konser musik',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto vokalis band sedang bernyanyi di atas panggung',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto penonton sedang moshing di konser musik',
]);

// Foto Dokumentasi Event Lainnya
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto peserta event sedang bermain games',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1559223607-b4d0555ae227?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto peserta event sedang makan bersama',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://plus.unsplash.com/premium_photo-1663011131989-e749d08736c8?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto peserta event sedang berfoto bersama di depan stand sponsor',
]);

// Foto Dokumentasi Event Pernikahan
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1528605248644-14dd04022da1?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto pengantin melempar buket bunga',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1528605105345-5344ea20e269?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto pengantin memotong kue pernikahan',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1496024840928-4c417adf211d?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto tamu undangan sedang memberikan ucapan selamat kepada pengantin',
]);

// Foto Dokumentasi Event Ulang Tahun
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => 'https://images.unsplash.com/photo-1501238295340-c810d3c156d2?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'content' => 'Foto anak yang sedang meniup balon ulang tahun',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto anak sedang bermain dengan kue ulang tahun',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto keluarga dan teman-teman sedang menyanyikan lagu selamat ulang tahun',
]);

// Foto Dokumentasi Event Seminar
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto peserta seminar sedang mengajukan pertanyaan kepada pembicara',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto peserta seminar sedang membuat catatan',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto peserta seminar sedang berfoto bersama di depan papan tulis',
]);

// Foto Dokumentasi Event Konser Musik
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto penonton sedang menari dengan koreografi yang kompak',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto penonton sedang memegang lightstick dan bergoyang mengikuti musik',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto penonton sedang bernyanyi bersama lagu favorit mereka',
]);

// Foto Dokumentasi Event Lainnya
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto peserta event sedang mengikuti workshop',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto peserta event sedang bermain games interaktif',
]);
DB::table('gallery_activities')->insert([
    'id' => DB::raw('(UUID())'),
    'image_url' => $imageUrl[rand(0,5)],
    'content' => 'Foto peserta event sedang berfoto bersama di booth sponsor favorit mereka',
]);



    }
}
