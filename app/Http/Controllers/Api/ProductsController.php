<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $requset)
    {

        $user = auth()->user();

        if ($user->role == 'admin' || $user->role == 'employee') {
            if ($requset->has('search')) {
                $products = Products::where('name', 'like', '%'.$requset->search.'%')->get();
            } else {
                $products = Products::all();
            }
        } else {
            $products = Products::where('user_id', $user->id)->get();
        }

        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
