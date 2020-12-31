<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $developers = Developer::all();

        return view('developers.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('developers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);
        $path=$request->file('avatar')->store('public');

        

        $developer = new Developer([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phonenumber' => $request->get('phonenumber'),
            'address' => $request->get('address'),
            'avatar' => $path
        ]);
        $developer->save();
        
        return redirect('/developers')->with('success', 'Developer info saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $developer = Developer::find($id);
        return view('developers.edit', compact('developer'));
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
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);

        $developer = developer::find($id);
        $developer->first_name =  $request->get('first_name');
        $developer->last_name = $request->get('last_name');
        $developer->email = $request->get('email');
        $developer->phonenumber = $request->get('phonenumber');
        $developer->address = $request->get('address');
        $developer->avatar = $request->get('avatar');
        $developer->save();

        return redirect('/developers')->with('success', 'Developer Info updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $developer = Developer::find($id);
        $developer->delete();

        return redirect('/developers')->with('success', 'Developer deleted!');
    }


    public function multipledelete(Request $request)
    {
        $ids = $request->ids;
        Developer::whereIn('id', $ids)->delete();
        return response()->json(['success'=>"Developers has been deleted"]);
    }
}
