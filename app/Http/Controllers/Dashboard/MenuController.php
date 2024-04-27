<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::where("user_id",auth()->user()->id)->get();
        return view("dashboard.menus.index",compact("menus"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_name' => 'required|string|unique:menus,name',
        ]);

        Menu::create([
            'name' => $data['menu_name'],
            "user_id" => auth()->user()->id
        ]);
        return response()->json("Menu Created Successfully");
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $menu)
    {
        dd($menu->all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        if($menu->user_id != auth()->user()->id){
            abort(403);
        }
        return view("dashboard.menus.edit",compact("menu"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Menu $menu)
    {
        if($menu->user_id != auth()->user()->id){
            abort(403);
        }
        $data = $request->validate([
            "name" => "required|string"
        ]);
        $menu->update($data);
        return redirect()->route('dashboard.menus.index')->with("success","Menu Updated Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if($menu->user_id != auth()->user()->id){
            abort(403);
        }
        $menu->delete();
        return redirect()->route('dashboard.menus.index')->with("success","Menu Deleted Success");

    }

}
