<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Form::all();
        return view('pages.profile',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::put('public/img',$request->file('img'));
        Storage::put('public/cv',$request->file('cv'));
        Storage::put('public/lettre',$request->file('lettre'));
        $store = new Form();
        $store -> nom = $request->nom;
        $store -> prenom = $request->prenom;
        $store -> age = $request->age;
        $store -> img = $request->file('img')->hashName();
        $store -> lettre = $request->file('lettre')->hashName();
        $store -> cv = $request->file('cv')->hashName();
        $store->save();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form,$id)
    {
        $show = Form::find($id);
        return view('pages.update',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormRequest  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, Form $form,$id)
    {
        $store = Form::find($id);
        $store -> nom = $request->nom;
        $store -> prenom = $request->prenom;
        $store -> age = $request->age;
        // $store -> img = $request->file('img')->hashName();
        $store -> save();
        return redirect('/realIndex');
        if( $request->file('img') != null)
        {
            Storage::delete('public/img/'. $store->img);
            Storage::put('public/img/', $request->file('img'));
            $store->img = $request->file('img')->hashName();
            $store->save();        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form,$id)
    {
        $delete = Form::find($id);
        $delete->delete();
        Storage::delete('public/img/'.$delete->img);
        return redirect()->back();
    }
//Création du download que pour l'img
    public function download($id)
    {
        $download = Form::find($id);
        return Storage::download('public/img/'.$download->img);
    }

}
