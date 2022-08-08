<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //=======================================================================
        //                           First Row
        //=======================================================================

        //=======================================================================
        //                           First Row
        //=======================================================================

        Card::create([
            'color' => 'success',
            'weight' => 11
        ]);

        Card::create([
            'color' => 'success',
            'weight' => 12
        ]);

        Card::create([
            'color' => 'primary',
            'weight' => 13
        ]);

        Card::create([
            'color' => 'warning',
            'weight' => 14
        ]);

        Card::create([
            'color' => 'warning',
            'weight' => 15
        ]);

        //=======================================================================
        //                           Second Row
        //=======================================================================

        Card::create([
            'color' => 'success',
            'weight' => 21
        ]);

        Card::create([
            'color' => 'success',
            'weight' => 22
        ]);

        Card::create([
            'color' => 'primary',
            'weight' => 23
        ]);

        Card::create([
            'color' => 'warning',
            'weight' => 24
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 25
        ]);

        //=======================================================================
        //                           Third Row
        //=======================================================================

        Card::create([
            'color' => 'success',
            'weight' => 31
        ]);

        Card::create([
            'color' => 'primary',
            'weight' => 32
        ]);

        Card::create([
            'color' => 'warning',
            'weight' => 33
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 34
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 35
        ]);

        //=======================================================================
        //                           Fourth Row
        //=======================================================================

        Card::create([
            'color' => 'primary',
            'weight' => 41
        ]);

        Card::create([
            'color' => 'warning',
            'weight' => 42
        ]);

        Card::create([
            'color' => 'warning',
            'weight' => 43
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 44
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 45
        ]);

        //=======================================================================
        //                           Fifth Row
        //=======================================================================

        Card::create([
            'color' => 'warning',
            'weight' => 51
        ]);

        Card::create([
            'color' => 'warning',
            'weight' => 52
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 53
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 54
        ]);

        Card::create([
            'color' => 'danger',
            'weight' => 55
        ]);
    }
}
