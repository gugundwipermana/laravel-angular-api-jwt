<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use JWTAuth;
use App\Product;
use App\Category;

class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index']]);
        $this->middleware('cors');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $products = Product::with('categories')->get();
        return $products;
    }

    public function user(Request $request)
    {
        if ($request->headers->has('Authorization')) {
            $user = JWTAuth::parseToken()->authenticate();
            return $user;
        }
    }

    public function recommend(Request $request)
    {
        if ($request->headers->has('Authorization')) {
        
            $user = JWTAuth::parseToken()->authenticate();
            
            /* return response()->json(array('user'=>$user,'products'=>$products, 'recommendedProducts'=>$recommendedProducts));*/

            $products = Product::with('categories')
                                ->select('products.id', 'products.name', 'products.price', 'products.description', 'products.image')
                                ->join('category_product', 'products.id', '=', 'category_product.product_id')
                                ->join('categories', 'category_product.category_id', '=', 'categories.id')
                                ->join('category_user', 'categories.id', '=', 'category_user.category_id')
                                ->join('users', 'category_user.user_id', '=', 'users.id')
                                ->where('users.id', $user->id)
                                ->groupBy('products.id')
                                ->get();

            return $products;

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return response()->json(["message"=>"Success"]);
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
