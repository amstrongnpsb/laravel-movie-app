<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Director;
use App\Models\Category;

class FilmController extends Controller
{
    public function index()
    {
        $header = '';
        if (request('category')) {
            // $category = Category::firstWhere('slug', request('category'));
            // $category = Category::firstWhere('slug', request('category'));
            $header = ' in ' . request('category');
        }
        if (request('director')) {
            $director = Director::firstWhere('director_slug', request('director'));
            $header = ' by ' . $director->name;
        }
        return view('data', [
            "header" => "All Film" . $header,
            "title" => "Film",
            "active" => "film",
            // "films" => Film::all()
            //memanggil fungsi director dan category yg ada pada model film yg merelasi film dengan director dan category
            // "films" => Film::with(['director', 'category'])->latest()->get()
            "films" => Film::latest()->filter(request(['search', 'category', 'director']))->paginate(7)
        ]);
    }

    public function detail(Film $film)
    {
        return view('detail', [
            "title" => "Detail",
            "active" => "film",
            // "detail" => Film::find($film)
            "film" => $film
        ]);
    }
}
