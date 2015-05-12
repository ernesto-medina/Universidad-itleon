<?php namespace App\Http\Controllers\Products;
use Cart;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	protected  $request;

	public function index()
	{
		//
		$products = Product::paginate();
		$cart_instance = Cart::instance(Session::get('_token'));
	$cart_instance->add('193ao12', 'Product 2', 1, 9.99);

		return view('Products.index', compact('products'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::findOrFail($id);
        return view('products.product_view', compact('product'));
   	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function addCart(Request $request)
    {
        $data=$request->all();
				//dd(Session::get('_token'));
 				$cart_instance = Cart::instance(Session::get('_token'));
				$cart_instance->add('192ao12', 'Product 1', 1, 9.99);
        return redirect()->back();
    }

}
