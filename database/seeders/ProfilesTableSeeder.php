<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;


class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'user_id' => 1,
            'name' => 'John Doe',
            'title' => 'Web Developer',
            'bio' => 'I love coding!',
            'photo_url' => null,
            'facebook' => 'https://facebook.com/johndoe',
            'instagram' => 'https://instagram.com/johndoe',
            'whatsapp' => 'https://twitter.com/johndoe',
            'linkedin' => 'https://linkedin.com/in/johndoe',
            'nfc_tag_id' => '12345',
        ]);
    }
}
