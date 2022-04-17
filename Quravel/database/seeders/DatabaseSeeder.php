<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=>'deden',
            'email'=> 'deden123@gmail.com',
            'password'=> Hash::make('deden123'),
        ]);
        User::create([
            'name'=>'alya',
            'email'=> 'alya123@gmail.com',
            'password'=> Hash::make('alya123'),
        ]);
        Post::create([
            'username' => 'deden',
            'title'=>'Jalan jalan di gedung sate',
            'like'=> 0,
            'slug' => Str::slug('Jalan jalan di gedung sate'),
            'excerpt'=>'<div>Museum Gedung Sate terletak di Bandung, Jawa Barat, Indonesia. Gedung Sate terkenal sebagai kantor gubernur, namun disana juga terdapat museum juga. Terletak di sebelah kantor tak membuat museum...',
            'body'=>'<div>Museum Gedung Sate terletak di Bandung, Jawa Barat, Indonesia. Gedung Sate terkenal sebagai kantor gubernur, namun disana juga terdapat museum juga. Terletak di sebelah kantor tak membuat museum ini sepi, banyak pengunjung yang datang setiap harinya. Bangunan ini mempunyai gaya arsitektur campuran bernuansa Indonesia dan Eropa sehingga tampak elegan dan mewah.<br><br></div><div>Mengapa bangunan ini disebut Gedung Sate? karena dilihat dari atas atap terdapat makanan khas Indonesia yaitu Sate. Untuk masuk Museum Gedung Sate ini hanya perlu membayar Rp. 5.000,- saja, cukup murah kan. Museum ini dapat dikunjungi setiap hari Selasa-Minggu mulai pukul 09.00- 17.00 WIB. Kapasitas daya tampung saat sekali masuk hanya dapat memuat sekitar 30 an orang. Jika pengunjung datang secara bergerombol, kalian harus antri terlebih dahulu di teras. Tapi gak usah takut sambil menunggu antrian masuk, kita bisa melihat taman yang indah di sekitar museum.<br>Di lingkungan museum Gedung Sate terdapat taman yang cantik dan bagus untuk dibuat foto bersama teman – teman. Arsitektur yang megah dengan dikelilingi taman dan pepohonan membuat kesan sejuk dan nyaman. Air mancur yang terdapat di belakang pintu masuk museum cocok untuk membuat kenangan bersama teman-teman. Dengan luasnya kawasan ini, kita menjadi bebas menikmati pemandangan disekitar tetapi harus dijaga juga tata kramanya karena mengingat gedung ini masih bersebelahan dengan kantor gubernur.</div>',
        ]);
        Post::create([
            'username' => 'alya',
            'title'=>'Liburan di bandung enaknya dimana ya?',
            'like'=> 0,
            'slug' => Str::slug('Liburan di bandung enaknya dimana ya?'),
            'excerpt'=>'Saya kemarin ada niatan untuk pergi ke bandung, saya orang jakarta. Jujur bingung banget ke bandung mau ngapain. Enaknya kuliner? wisata? atau alam ya?',
            'body'=>'Saya kemarin ada niatan untuk pergi ke bandung, saya orang jakarta. Jujur bingung banget ke bandung mau ngapain. Enaknya kuliner? wisata? atau alam ya?',
        ]);
    }
}
