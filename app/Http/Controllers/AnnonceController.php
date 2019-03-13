<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Annonce;
use App\User;
use App\Category;
use App\Photo;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::with('annonce')->get();
      $annonces = Annonce::latest()->paginate(5);
      return view('Annonce.index', compact('annonces', 'categories'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function category($id)
    {
      $categories = Category::with('annonce')->get();
      $annonces = Annonce::latest()
      ->where('category_id', $id)
      ->paginate(5);
      return view('Annonce.index', compact('annonces', 'categories'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('Annonce.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->filename)
      {
        $file = $request->filename;
        $name=time().$file->getClientOriginalName();
        $file->move(public_path().'/images/', $name);
      }
      $annonce = new Annonce;
      $annonce->user_id=Auth::user()->id;
      $annonce->category_id=$request->category_id;
      $annonce->title=$request->title;
      $annonce->content=$request->content;
      $annonce->filename=$name;
      $annonce->prix=$request->prix;
      $annonce->save();

      return redirect('annonce')->with('success', 'Information has been added');
    }

    public function add($id)
    {
      $annonce = Annonce::findOrFail($id);
      return view('Annonce.add', compact('annonce'));
    }

    public function images(Request $request, $id)
    {
      if($request->filename)
      {
        $file = $request->filename;
        $name=$file->getClientOriginalName();
        $file->move(public_path().'/images/', $name);
      }
      $photo = new Photo;
      $photo->annonce_id=$id;
      $photo->filename=$name;
      $photo->save();

      return redirect('annonce')->with('success', 'Images has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $annonce = Annonce::findOrFail($id);
      $photos = Photo::where('annonce_id', $annonce->id)->get();
      return view('Annonce.show', compact('annonce', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categories = Category::get();
      $annonce = Annonce::findOrFail($id);
      return view('Annonce.edit', compact('annonce', 'id', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $annonce = Annonce::findOrFail($id);
      $annonce->user_id=Auth::user()->id;
      $annonce->filename=$annonce->filename;
      $annonce->title=$request->title;
      $annonce->category_id=$request->category;
      $annonce->content=$request->content;
      $annonce->prix=$request->prix;
      $annonce->save();

      return redirect('annonce')->with('success', 'Information has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $annonce = Annonce::findOrFail($id);
      $annonce->delete($id);

      return redirect('annonce')->with('success', 'Annonce has been deleted');
    }
}
