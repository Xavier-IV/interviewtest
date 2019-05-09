<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jacket;

class JacketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jackets = Jacket::orderBy('created_at', 'desc')->get();
        return view('pages.jackets')->with('jackets', $jackets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jacketcreate');
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
            'price' => 'required',
            'brand' => 'required',
            'image' => 'image|max:1999',
        ]);

        // handle file upload
        if ($request->hasFile('image')){
            // get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $jacket = new Jacket;
        $jacket->name = $request->input('name');
        $jacket->price = $request->input('price');
        $jacket->brand = $request->input('brand');
        $jacket->image = $fileNameToStore;
        $jacket->save();

        return redirect('/jackets')->with('success', 'New jacket created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jacket = Jacket::find($id);
        return view('pages.jacketshow')->with('jacket', $jacket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jacket = Jacket::find($id);
        return view('pages.jacketedit')->with('jacket', $jacket);
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
            'price' => 'required',
            'brand' => 'required',
            'image' => 'image|max:1999',
        ]);

        // handle file upload
        if ($request->hasFile('image')){
            // get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            // get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // get just extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

        }

        $jacket = Jacket::find($id);
        $jacket->name = $request->input('name');
        $jacket->price = $request->input('price');
        $jacket->brand = $request->input('brand');
        if ($request->hasFile('image')){
            $jacket->image = $fileNameToStore;
        }
        $jacket->save();

        return redirect('/jackets')->with('success', 'Jacket updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jacket = Jacket::find($id);

        if($jacket->image != 'noimage.jpg'){
            Storage::delete('public/image/'.$jacket->image);
        }

        $jacket->delete();
        return redirect('/jackets')->with('success', 'Jacket deleted!');
    }
}
