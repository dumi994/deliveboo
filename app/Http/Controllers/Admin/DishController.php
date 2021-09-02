<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $user=Auth::user()->id;
       $dishes=Dish::where('user_id',$user)->get();
       return view('admin.dishes.index',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user_id=$request->user()->id;
        $validatedData = $request ->validate([
            'name' => 'required | max:50 | min:1',
            'type' => 'required',
            'description' => 'nullable',
            'ingredients' => 'nullable',
            'img' => 'nullable | mimes:jpeg,jpg,png| max: 5000',
            'price' => 'required | numeric',
            'visibility' => 'required | boolean'
            ]);

            
            $img = Storage::disk('public')->put('dish_images', $request->img);
            $validatedData['img'] = $img;

            // ddd($validatedData);


            $validatedData['user_id']=$current_user_id;

            Dish::create($validatedData);
            return redirect()->route('admin.dishes.index');
        }
        
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show(Dish $dish)
        {
            return view('admin.dishes.show', compact('dish'));
        }
        
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit(Dish $dish)
        {
            $dtypes=config('dtype.data');
            return view('admin.dishes.edit', compact('dish', 'dtypes'));
        }
        
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $current_user_id=$request->user()->id;
        $validatedData = $request ->validate([
            'name' => 'required | max:50 | min:1',
            'type' => 'required',
            'description' => 'nullable',
            'ingredients' => 'nullable',
            'img' => 'nullable | mimes:jpeg,jpg,png| max: 5000',
            'price' => 'required | numeric',
            'visibility' => 'required | boolean'
        ]);
        
        if ($request->hasFile('img')) {
        $img = Storage::disk('public')->put('dish_images', $request->img);
        $validatedData['img'] = $img;
        }

        $validatedData['user_id']=$current_user_id;

        $dish->update($validatedData);
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}
