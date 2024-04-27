<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (empty($request->category)) {
            $products = Product::where("user_id", auth()->user()->id)->get();
        }
        $products = Product::where("user_id", auth()->user()->id)->get();
        return view('dashboard.products.index', compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::where("user_id", auth()->user()->id)->get();
        return view('dashboard.products.create', compact("menus"));
    }

    public function getCategoriesOfMenu(Request $request)
    {
        $menu = Menu::find($request->menu_id);
        if ($menu->user_id != auth()->user()->id) {
            abort(403);
        }
        return response()->json($menu->categories);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "description" => "nullable|string",
            "price" => "numeric|required_if:small,null,medium,null,large,null",
            "small" => "nullable|numeric",
            "medium" => "nullable|numeric",
            "large" => "nullable|numeric",
            "extra_large" => "nullable|numeric",
            "menu_id" => "required|exists:menus,id,user_id," . auth()->user()->id,
            "category_id" => "required|exists:categories,id,user_id," . auth()->user()->id
        ]);
        if ($request->small != null || $request->medium != null || $request->large != null || $request->extra_large != null) {
            $data["price"] = null;
        }
        $data["user_id"] = auth()->user()->id;
        Product::create($data);
        return redirect()->route("dashboard.products.create")->with("success", "Product Created Success");

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
    public function edit(Product $product)
    {
        $menus = Menu::where("user_id", auth()->user()->id)->get();
        return view("dashboard.products.edit",compact("product","menus"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            "name" => "required|string",
            "description" => "nullable|string",
            "price" => "numeric|required_if:small,null,medium,null,large,null",
            "small" => "nullable|numeric",
            "medium" => "nullable|numeric",
            "large" => "nullable|numeric",
            "extra_large" => "nullable|numeric",
            "menu_id" => "required|exists:menus,id,user_id," . auth()->user()->id,
            "category_id" => "required|exists:categories,id,user_id," . auth()->user()->id
        ]);
        if ($request->small != null || $request->medium != null || $request->large != null || $request->extra_large != null) {
            $data["price"] = null;

        }else{
            $data["small"] = null;
            $data["medium"] = null;
            $data["large"] = null;
            $data["extra_large"] = null;
        }
        $product->update($data);
        return redirect()->route("dashboard.products.index")->with("success", "Product Updated Success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
