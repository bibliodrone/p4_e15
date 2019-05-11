<?php

use Illuminate\Database\Seeder;
use App\Workout;
use App\Bodypart;

class BodypartsTableSeeder extends Seeder
{
    public function run()
    {
        $bodyparts = ['chest', 'back', 'shoulders', 'arms', 'legs'];
        $count = count($bodyparts);
        
        foreach ($bodyparts as $bp)
        {
            $bodypart = new Bodypart();
            $bodypart->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $bodypart->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $bodypart->body_part = $bp;
            
            $bodypart->save();
            
            $count--;
        }
    }
}
