<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('entries')->insert([
        [
            'user_id' => 1,
            'uuid' => (string) Str::uuid(),
            'adventure' => 'castle1',
            'title' => 'Outer Gatehouse',
            'description' => 'Before you, the towering outer gatehouse of the castle stands, a monolith of stone and timber, its authority palpable. The hefty doors, banded with iron, and the ominous wooden portcullis overhead immediately signal its defensive purpose. The gatehouse\'s stony facade is punctuated by narrow arrow slits, a chilling reminder of the lethal force lying in wait for unwelcome guests. Above, the upper floors hint at life within—the flicker of candlelight at the window slits reveals guardrooms and living quarters, the home of the castle\'s ever-vigilant guardians. Intricately woven into this tableau is the robust drawbridge mechanism, with its sturdy chains and weathered wood, ready to transform the entrance into an impassable obstacle at a moment\'s notice. This formidable display is an unspoken testament to the castle\'s might, an unwavering symbol of defense and dominion.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        [
            'user_id' => 1,
            'uuid' => (string) Str::uuid(),
            'adventure' => 'castle1',
            'title' => 'Drawbridge',
            'description' => 'Standing on the weathered planks of the open drawbridge, you can feel the grain of centuries-old timber under your boots. The wide expanse of the drawbridge creaks slightly beneath you, a resonant echo of countless footfalls that have traversed it before. To your sides, robust chains lie taut, their metallic coolness a contrast to the warm wood, a testament to their strength and the silent promise of safe passage. Looking down, you see the dark depths of the moat below, its murky waters still and quiet, hinting at unseen depths. The scent of damp earth and stagnant water rises up, mingling with the more comforting aroma of old wood. As you step forward, the sheer enormity of the castle envelops you, the drawbridge serving as your pathway from the mundane to the majestic.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ],
        ]);
    }
}