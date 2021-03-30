<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $names = ['Dashboard', 'Menu', 'Users', 'Subscribed people','Messages', 'Reviews','Hotel Services','Rooms','Room Services','Types','Booking', 'Testimonials','Prices'];
    private $urls = ['admin', 'menus.index', 'users.index','subscribes.index', 'messages.index', 'reviews.index', 'hotel-services.index', 'rooms-manage.index', 'services.index', 'types.index', 'bookings.index', 'testimonials.index', 'prices.index'];
    private $icons = ['icon-chart-pie-36', 'icon-atom', 'icon-single-02','icon-atom', 'icon-pin', 'icon-bell-55', 'icon-spaceship', 'icon-world', 'icon-spaceship', 'icon-align-center', 'icon-bell-55', 'icon-bell-55', 'icon-pin'];

    public function run()
    {
        for ($i = 0, $iMax = count($this->names); $i < $iMax; $i++){
            DB::table('admin_menus')->insert([
                'name' => $this->names[$i],
                'url' => $this->urls[$i],
                'order' => $i,
                'icon' => $this->icons[$i]
            ]);
        }
    }
}
