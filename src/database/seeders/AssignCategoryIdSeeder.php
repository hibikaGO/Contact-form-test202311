<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use App\Models\Category;

class AssignCategoryIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::inRandomOrder()->get();

        Contact::chunk(100, function ($contacts) use ($categories) {
            foreach ($contacts as $contact) {
                $randomCategory = $categories->random();
                $contact->update(['category_id' => $randomCategory->id]);
            }
        });
    }
}
