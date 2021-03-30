<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $paths = ['https://www.facebook.com/', 'https://twitter.com/', 'https://www.tripadvisor.in/', 'https://www.instagram.com/', 'https://www.youtube.com/'];
    private $icons = ['fab fa-facebook-f', 'fab fa-twitter', 'fab fa-tripadvisor', 'fab fa-instagram', 'fab fa-youtube'];


    public function run()
    {
        for ($i = 0, $iMax = count($this->paths); $i < $iMax; $i++){
            DB::table('social_media')->insert([
                'path' => $this->paths[$i],
                'icon' => $this->icons[$i]
            ]);
        }
    }
}
