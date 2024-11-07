<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function getSeasonsString(){
        $array_string = $this->best_seasons;
        //dump($array_string);
        $seasons = json_decode($array_string, false, 512, JSON_UNESCAPED_UNICODE);
        //dump(gettype($seasons));
        //dd($seasons);
        $seasons_string = '';
        foreach($seasons as $season){
            $seasons_string = $seasons_string.$season;
            $seasons_string = $seasons_string." ";
        }
        return $seasons_string;
    }
    #TODO Co w sytuacji, w którem do miejsca jest dodane mniej niż 3 zdjęcia?
}
