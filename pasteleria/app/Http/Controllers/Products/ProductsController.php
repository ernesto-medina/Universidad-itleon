<?php namespace App\Http\Controllers\Products;

use Cart;
use DB;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class ProductsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
		//
		$products = DB::table('products')->paginate();
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
	public function store(Request $request)
	{
		//

		$img_encode = (string) Image::make($request->all()['image_decode'])->fit(400,400)->encode('data-url');
//dd($img_encode);
		//dd(base64_decode(Image::make($request->all()['image_decode'])->fit(600, 600)), $img_encode);
		$request->merge(array('image'=> $img_encode));

		$product = new Product($request->all());

		$product->save();
		return view('Products.index', compact('products'));

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
	public function update($id, Request $request)
	{

		$user = Product::findOrFail($id)->update($request->all());
		return \Redirect::back();
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
				// dd($data);
				$faker = Faker::create();
 				$cart_instance = Cart::instance(Session::get('_token'));
				$line_id = $cart_instance->search(array('name' => $data['product_id']));
				if ($line_id){
					$cart_instance->update($line_id[0], $cart_instance->get($line_id[0])['qty']+$data['cantidad']);
				}
				else{
					$cart_instance->add($faker->uuid(), $data['product_id'], $data['cantidad'], $data['product_precio']);
				}


        return redirect()->back();
    }

}
