<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use DB;

class PHousesController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::orderBy('name', 'asc')->paginate(2);
        return view('houses.index')->with('houses', $houses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('houses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'adress' => 'required',
            'contact' => 'required',
        ]);

        $house = new House;
        $house->name = $request->input('name');
        $house->adress = $request->input('adress');
        $house->contact = $request->input('contact');
        $house->user_id = auth()->user()->id;
        $house->save();

        return redirect('/houses')->with('success', 'Publishing House created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $house = House:: find($id);
        return view ('houses.show')->with('house', $house);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $house = House:: find($id);

        if(auth()->user()->id !==$house->user_id){
            return redirect ('/houses')->with('error', 'Unauthorized page');
        }
        return view ('houses.edit')->with('house', $house);
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
        
            $this->validate($request, [
                'name' => 'required',
                'adress' => 'required',
                'contact' => 'required',
            ]);
    
            $house = House::find($id);
            $house->name = $request->input('name');
            $house->adress = $request->input('adress');
            $house->contact = $request->input('contact');
            $house->save();
    
            return redirect('/houses')->with('success', 'Publishing House updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $house = House::find($id);

        if(auth()->user()->id !==$house->user_id){
            return redirect ('/houses')->with('error', 'Unauthorized page');
        }

        
        $house->delete();
        return redirect('/houses')->with('success', 'Publishing House deleted');


    }
}
