<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovement;
use Collective\Html\Eloquent\FormAccessible;

class MovementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name','id');
        return view('movements.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovement $request)
    {
       $movement = new Movement($request->all());
       $movement->money = $request->get('money_decimal')*100;
       $category = $request->get('category_id');
       if(!is_numeric($category)){
           $newCategory = Category::firstOrCreate(['name' => ucwords($category)]);
           $movement->category_id = $newCategory->id;
       }

       //para asignar el usuario es dueño de ese movimiento - como que se relaciona con el usuario logeado
       $movement->user_id = auth()->user()->id;

       //imagen
       if($request->hasFile('image')){
        $image = $request->file('image');
        $file = $image->store('image/movements');
        $movement->image = $file;
       }
       $movement->save();
       return redirect() -> route('movements.show', $movement);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
