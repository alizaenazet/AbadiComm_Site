<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $imageUrl = [
            'https://source.unsplash.com/800x800/?person',
            'https://source.unsplash.com/800x800/?face',
            'https://source.unsplash.com/800x800/?portrait',
            'https://source.unsplash.com/800x800/?human',
            'https://source.unsplash.com/800x800/?model',
        ];
        // Divisi Perencanaan
    DB::table('divisions')->insert([
            'id' => '123e4567-e89b-12d3-a456-426655442003',
            'name' => 'Perencanaan',
        ]);

        // Anggota Divisi Perencanaan
        DB::table('team_members')->insert([
            'name' => 'Diana',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Teknik Sipil',
            'division_id' => '123e4567-e89b-12d3-a456-426655442003',
        ]);
        DB::table('team_members')->insert([
            'name' => 'Budi',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Arsitektur',
            'division_id' => '123e4567-e89b-12d3-a456-426655442003',
        ]);
        DB::table('team_members')->insert([
            'name' => 'Agus',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Manajemen',
            'division_id' => '123e4567-e89b-12d3-a456-426655442003',
        ]);

        // Divisi Pemasaran
    DB::table('divisions')->insert([
            'id' => '567890ab-cdef-1234-5678-90ab0cde1237',
            'name' => 'Pemasaran',
        ]);

        // Anggota Divisi Pemasaran
        DB::table('team_members')->insert([
            'name' => 'Rina',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Ilmu Komunikasi',
            'division_id' => '567890ab-cdef-1234-5678-90ab0cde1237',
        ]);
        DB::table('team_members')->insert([
            'name' => 'Rendi',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Desain Komunikasi Visual',
            'division_id' => '567890ab-cdef-1234-5678-90ab0cde1237',
        ]);
        DB::table('team_members')->insert([
            'name' => 'Ani',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Ekonomi',
            'division_id' => '567890ab-cdef-1234-5678-90ab0cde1237',
        ]);

        // Divisi Inventory
    DB::table('divisions')->insert([
            'id' => '123e4567-e89b-12d3-a456-426655496313',
            'name' => 'Inventory',
        ]);

        // Anggota Divisi Inventory
        DB::table('team_members')->insert([
            'id' => '123e4567-e89b-12d3-a456-426655440004',
            'name' => 'Wuwung',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Teknik Industri',
            'division_id' => '123e4567-e89b-12d3-a456-426655496313',
        ]);
        DB::table('team_members')->insert([
            'id' => '123e4567-e89b-12d3-a456-426655440005',
            'name' => 'Ivan',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sertifikat Manajemen Inventory',
            'division_id' => '123e4567-e89b-12d3-a456-426655496313',
        ]);
        DB::table('team_members')->insert([
            'id' => '123e4567-e89b-12d3-a456-426655440006',
            'name' => 'Cici',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sertifikat Akuntansi',
            'division_id' => '123e4567-e89b-12d3-a456-426655496313',
        ]);

        // Divisi Sumber Daya Manusia
    DB::table('divisions')->insert([
            'id' => '567890ab-cdef-1234-5678-90ab0cde1235',
            'name' => 'Sumber Daya Manusia',
        ]);

        // Anggota Divisi Sumber Daya Manusia
        DB::table('team_members')->insert([
            'name' => 'Dani',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sarjana Psikologi',
            'division_id' => '567890ab-cdef-1234-5678-90ab0cde1235',
        ]);
        DB::table('team_members')->insert([

            'name' => 'Eka',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sertifikat Human Resources',
            'division_id' => '567890ab-cdef-1234-5678-90ab0cde1235',
        ]);
        DB::table('team_members')->insert([

            'name' => 'Fani',
            'image_url' => $imageUrl[rand(0,4)],
            'qualification' => 'Sertifikat',
            'division_id' => '567890ab-cdef-1234-5678-90ab0cde1235',
        ]);

    }
}
