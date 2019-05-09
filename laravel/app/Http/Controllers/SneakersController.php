<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Sneaker;

class SneakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sneakers = Sneaker::orderBy('created_at', 'desc')->get();
        return view('pages.sneakers')->with('sneakers', $sneakers);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.sneakercreate');
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

        $sneaker = new Sneaker;
        $sneaker->name = $request->input('name');
        $sneaker->price = $request->input('price');
        $sneaker->brand = $request->input('brand');
        $sneaker->image = $fileNameToStore;
        $sneaker->save();

        return redirect('/sneakers')->with('success', 'New sneaker created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sneaker = Sneaker::find($id);
        return view('pages.sneakershow')->with('sneaker', $sneaker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sneaker = Sneaker::find($id);
        return view('pages.sneakeredit')->with('sneaker', $sneaker);
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

        $sneaker = Sneaker::find($id);
        $sneaker->name = $request->input('name');
        $sneaker->price = $request->input('price');
        $sneaker->brand = $request->input('brand');
        if ($request->hasFile('image')){
            $sneaker->image = $fileNameToStore;
        }
        $sneaker->save();

        return redirect('/sneakers')->with('success', 'Sneaker updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sneaker = Sneaker::find($id);

        if($sneaker->image != 'noimage.jpg'){
            Storage::delete('public/image/'.$sneaker->image);
        }

        $sneaker->delete();
        return redirect('/sneakers')->with('success', 'Sneaker deleted!');
    }
}
