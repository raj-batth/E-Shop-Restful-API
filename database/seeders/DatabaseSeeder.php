<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ReviewSeeder::class);
        
        $this->updateNumReviewAndRating();
    }

    public function updateNumReviewAndRating()
    {
        DB::statement("UPDATE `products` as p
        SET `rating`= (
            (Select sum(rating) from reviews where product_id = p.id group by product_id)/(Select count(product_id) from reviews where product_id = p.id)),
            `num_review` = (Select count(product_id) from reviews where product_id = p.id)");
    }
}
