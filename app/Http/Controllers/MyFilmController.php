<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Category;
use App\Models\Director;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class MyFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.myfilm.index', [
            // 'films' => Film::where('likeby', auth()->user()->id)->get(),
            'films' => Film::where('user_posted', auth()->user()->id)->get(),
            'sidebar' => "active"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.myfilm.create',[
            'sidebar' => "active",
            'categories' => Category::all(),
            'directors' => Director::all()
        ]);
    }

    public function slugGenerate(Request $request)
    {
        $slug = SlugService::createSlug(Film::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        //films merupakan nama table pada database
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:films',
            'category_id' => 'required',
            'full_sinopsis' => 'required',
            'film_img' => 'image|file|max:1024',
            'director_id' => 'required',
        ]);
        if ($request->file('image')){
            $validatedData['film_img'] = $request->file('image')->store('film_img');
        }
        $validatedData['likeby'] = 9;
        $validatedData['user_posted'] = auth()->user()->id;
        $validatedData['sinopsis'] = Str::limit(strip_tags($request->full_sinopsis, 200));
        Film::create($validatedData);
        return redirect('/dashboard/myfilm')->with('actionsuccess', 'New Film has been added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $myfilm)
    {         
        return view('dashboard.myfilm.show', [

            'film' => $myfilm, 
            'sidebar' => "unactive"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $myfilm)
    {
        return view('dashboard.myfilm.edit',[
            'sidebar' => "active",
            'film' => $myfilm,
            'categories' => Category::all(),
            'directors' => Director::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $myfilm)
    {   
    if($myfilm->user_posted !== auth()->user()->id) {
    abort(403);
    }
        //pengecekan data apakah sesuai dengan format
        $checkData = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'film_img' => 'image|file|max:1024',
            'full_sinopsis' => 'required',
            'director_id' => 'required',
        ];
        
        if ($request->slug != $myfilm->slug) {
            $checkData['slug'] = 'required|unique:films';
        }
        //validatedData untuk di store ke database
        $validatedData = $request->validate($checkData);
        
        if ($request->file('image')){
            if($myfilm->film_img){
                Storage::delete($myfilm->film_img);
            }
            $validatedData['film_img'] = $request->file('image')->store('film_img');
        }
        $validatedData['likeby'] = 9;
        $validatedData['user_posted'] = auth()->user()->id;
        $validatedData['sinopsis'] = Str::limit(strip_tags($request->full_sinopsis, 200));
        //update film dimana id yang dari table sama dengan $film->id(yg dari controller)
        Film::where('id', $myfilm->id)->update($validatedData);
        return redirect('/dashboard/myfilm')->with('actionsuccess', 'Film has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $myfilm)
    {
        if($myfilm->film_img){
            Storage::delete($myfilm->film_img);
        }
        Film::destroy($myfilm->id);
        return redirect('/dashboard/myfilm')->with('actionsuccess', 'Film has been deleted');
    }
}
