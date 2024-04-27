<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if(empty($request->menu)){
            $categories = Category::where("user_id", auth()->user()->id)->get();
        }else{
            $menu = Menu::where("name", "$request->menu")->where("user_id", auth()->user()->id)->with("categories")->first();
            $categories = $menu->categories;
        }
        return view("dashboard.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $menus = Menu::where("user_id", auth()->user()->id)->get();
        return view("dashboard.categories.create", compact("menus"));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $menu = Menu::where("id", $request->menu_id)->where("user_id", auth()->user()->id)->first();
        if(!$menu){
            return redirect()->route("dashboard.categories.create")->with("error","Menu Not Found");
        }
        $data = $request->validate([
            "name" => "required|string",
            "menu_id" => "required|exists:menus,id"
        ]);

        $data["user_id"] = auth()->user()->id;
        Category::create($data);
        return redirect()->route("dashboard.categories.create")->with("success","Category Created Success");
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Category $category)
    {
        if($category->user_id != auth()->user()->id){
            abort(403);
        }
        $menus = Menu::where("user_id", auth()->user()->id)->get();
        return view("dashboard.categories.edit",compact("category","menus"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if($category->user_id != auth()->user()->id){
            abort(403);
        }

        $data = $request->validate([
            "name" => "required|string",
            "menu_id" => "required|exists:menus,id,user_id,".auth()->user()->id
        ]);
        $category->update($data);
        return redirect()->route("dashboard.categories.index")->with("success","Category Updated Success");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->user_id != auth()->user()->id){
            abort(403);
        }
        $category->delete();
        return redirect()->route("dashboard.categories.index")->with("success","Category Deleted Success");
    }
}
