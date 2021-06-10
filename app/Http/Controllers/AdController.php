<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Photos;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::all();
        return view('annonces.ads', [
            'ads' => $ads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.form-annonce');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prix = floatval(request('prix'));

        if ($prix == 0) {
            flash('Veuillez saisir un prix valide')->error();
            return back()->withInput();
        }
        
        $ad = Ad::create([
            'titre' => request('titre'),
            'description' => request('description'),
            'prix' => request('prix'),
            'id_vendeur' => auth()->user()['id']
        ]);

        foreach($_FILES['image']['tmp_name'] as $photo) {
            $image = base64_encode(file_get_contents($photo));        
            $photo = Photos::create([
                'photo' => $image,
                'id_ad' => $ad['id']
            ]);
        }

        flash('Your ad was post !')->success();
        return redirect('my_ads');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::where('id', $id)->get();

        $update = false;

        if ($ad[0]['id_vendeur'] == Auth()->user()['id']) {
            $update = true;
        }

        return view('annonces.ad', 
        [
            'id' => $ad[0]['id'],
            'titre' => $ad[0]['titre'],
            'description' => $ad[0]['description'],
            'prix' => $ad[0]['prix'],
            'update' => $update
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::where('id', $id)->get();
        $ad = $ad[0];
        return view('annonces.form-edit_ad', [
            'id' => $ad['id'],
            'titre' => $ad['titre'],
            'description' => $ad['description'],
            'prix' => $ad['prix']
        ]);
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
        $ad = Ad::where('id', $id)->get();
        // dd($ad);

        $ad[0]->update([
            'titre' => request('titre'),
            'description' => request('description'),
            'prix' => request('prix')
        ]);
        flash('Your ad was update !')->success();
        return redirect('/my_ads/' . $ad[0]['id']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::where('id', $id)->get();
        $ad[0]->delete();
        flash('Your ad was deleted !');
        return redirect('/my_ads');
    }

    public function show_my_ads () {
        $id_user = auth()->user()['id'];
        $ads = DB::table('ads')
            ->where('id_vendeur', '=', $id_user)
            ->get();

        return view('annonces.my_ads', 
        [
            'ads' => $ads
        ]);
    }
}
