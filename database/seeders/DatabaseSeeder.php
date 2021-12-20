<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Director;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Movie::truncate();
        Director::truncate();
        Genre::truncate();

        $user = User::factory()->create();

        $gnrSci = Genre::create(['name'=>"Sci-fi"]);
        $gnrFa = Genre::create(['name'=>"Fantasy"]);
        $gnrTri = Genre::create(['name'=>"Thriller"]);
        $gnrAc = Genre::create(['name'=>"Action"]);
        $gnrCr = Genre::create(['name'=>"Drama"]);

        $dir1 = Director::create(['name'=>'Quentin',
        'surname' => 'Tarantino',
        'nationality'=>'American']);
        
        $dir2 = Director::create(['name'=>'Guy',
        'surname' => 'Ritchie',
        'nationality'=>'England']);

        $dir3 = Director::create(['name'=>'Steven',
        'surname' => 'Spielberg',
        'nationality'=>'American']);

        $movie1 = Movie::create(['name'=>'Pulp Fiction',
        'description'=>'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
        'genre_id'=>$gnrCr->id,
        'director_id'=>$dir1->id]);

        $movie2 = Movie::create(['name'=>'Django Unchained',
        'description'=>'With the help of a German bounty-hunter, a freed slave sets out to rescue his wife from a brutal plantation-owner in Mississippi.',
        'genre_id'=>$gnrCr->id,
        'director_id'=>$dir1->id]);

        $movie3 = Movie::create(['name'=>'Lock, Stock and Two Smoking Barrels',
        'description'=>'Eddy persuades his three pals to pool money for a vital poker game against a powerful local mobster, Hatchet Harry. Eddy loses, after which Harry gives him a week to pay back 500,000 pounds.',
        'genre_id'=>$gnrAc->id,
        'director_id'=>$dir2->id]);

        $movie4 = Movie::create(['name'=>'Sherlock Holmes',
        'description'=>'A police officer joins a secret organization that polices and monitors extraterrestrial interactions on Earth.',
        'genre_id'=>$gnrAc->id,
        'director_id'=>$dir2->id]);

        $movie5 = Movie::create(['name'=>'Saving Private Ryan',
        'description'=>'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.',
        'genre_id'=>$gnrAc->id,
        'director_id'=>$dir3->id]);

        $movie6 = Movie::create(['name'=>'Men in Black',
        'description'=>'Following the Normandy Landings, a group of U.S. soldiers go behind enemy lines to retrieve a paratrooper whose brothers have been killed in action.',
        'genre_id'=>$gnrSci->id,
        'director_id'=>$dir3->id]);
        

    }
}
