<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(RoadsTableSeeder::class);
        $this->call(RoadPlacesTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(HotelsTableSeeder::class);
        $this->call(ToursTableSeeder::class);
        $this->call(TourHotelsTableSeeder::class);
        $this->call(DepartionsTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'trungquan_tour_guide',
                'email' => 'trungquan_tour_guide@trungquandev.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456789',
                'address' => 'Hà Nội, Việt Nam',
                'image' => '',
                'role' => 'tour_guide',
                'created_at' => new DateTime()
            ], [
                'name' => 'trungquan_customer',
                'email' => 'trungquan_customer@trungquandev.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456788',
                'address' => 'Hà Nội, Việt Nam',
                'image' => '',
                'role' => 'customer',
                'created_at' => new DateTime()
            ], [
                'name' => 'trungquan_admin',
                'email' => 'trungquan_admin@trungquandev.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456783',
                'address' => 'Hà Nội, Việt Nam',
                'image' => '',
                'role' => 'admin',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class ProvincesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('provinces')->insert([
            [
                'name' => 'Hà Nội',
                'description'=>"Hà Nội là thủ đô của Việt Nam",
                'image' => '',
                'status' => 1,
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class PlacesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('places')->insert([
            [
                'province_id' => 1,
                'name' => 'Hồ Hoàn Kiếm',
                'description' => 'Hồ Hoàn kiếm là di tích lịch sử nổi tiếng',
                'image' => '',
                //'status' => 0,
                'created_at' => new DateTime()
            ], [
                'province_id' => 1,
                'name' => 'Cầu Long Biên',
                'description' => 'Cầu Long Biên là di tích lịch sử nổi tiếng',
                'image' => '',
                //'status' => 0,
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class RoadsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roads')->insert([
            [
                'name' => 'Hồ Hoàn Kiếm-Cầu Long Biên',
                'count_day' => '2',
                //'status' => 0,
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class RoadPlacesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('road_places')->insert([
            [
                'road_id' => 1,
                'place_id' => 1,
                'order_day' => 1,
                'batch' => 1,
                'created_at' => new DateTime()
            ], [
                'road_id' => 1,
                'place_id' => 2,
                'order_day' => 2,
                'batch' => 2,
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class TypesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('types')->insert([
            [
                'name' => 'Tiêu chuẩn - Hotel 4*',
                'created_at' => new DateTime()
            ], [
                'name' => 'Tiết kiệm - Hotel 3*',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class HotelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotels')->insert([
            [
                'name' => 'Khách sạn Hoa Sen',
                'type_id' => 1,
                'place_id' => 1,
                'created_at' => new DateTime()
            ], [
                'name' => 'Khách sạn Ngày Mới',
                'type_id' => 1,
                'place_id' => 2,
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class ToursTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tours')->insert([
            [
                'code' => '1',
                'road_id' => 1,
                'type_id' => 1,
                'percent' => 70,
                'price_adult' => 2000000,
                'price_child' => 1000000,
                //'eat' => 3,
                'travel' => 'Ô tô',
                'created_at' => new DateTime()
            ], [
                'code' => '2',
                'road_id' => 1,
                'type_id' => 2,
                'percent' => 70,
                'price_adult' => 2000000,
                'price_child' => 1000000,
                //'eat' => 3,
                'travel' => 'Máy bay',
                'created_at' => new DateTime()
            ]
        ]);
    }
}

class TourHotelsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('tour_hotels')->insert([
            [
                'tour_id' => 1,
                'hotel_id' => 1
            ], [
                'tour_id' => 1,
                'hotel_id' => 2
            ]
        ]);
    }
}

class DepartionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('departions')->insert([
            [
                'code' => '1_2018-08-01',
                'tour_id' => 1,
                'departure_day' => '2018-08-01',
                'user_id' => 1,
                'count_seat' => 3,
                'occupied_seat' => 1,
                'rest_seat' => 2
            ], [
                'code' => '2_2018-08-02',
                'tour_id' => 2,
                'departure_day' => '2018-08-02',
                'user_id' => 1,
                'count_seat' => 3,
                'occupied_seat' => 1,
                'rest_seat' => 2
            ]
        ]);
    }
}
