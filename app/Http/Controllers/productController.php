<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Repositories\productRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use Flash;
use Response;

class productController extends AppBaseController
{
    /** @var  productRepository */
    private $productRepository;

    public function __construct(productRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $products = $this->productRepository->all();
        $products = product::all()->sortByDesc('created_at');
        // var_dump($new_products);exit;
        return view('products.index', compact('products'));
            ;
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param CreateproductRequest $request
     *
     * @return Response
     */
    public function store(CreateproductRequest $request)
    {
        $input = $request->all();
        
        // $price = DB::table('products')->select('price')->where('price','=',$input['price'])->get();
        
        // $price_promotion = DB::table('products')->select('price_promotion')->where('price_promotion','=',$input['price_promotion'])->get();

        $price = $input['price'];
        $price_promotion = $input['price_promotion'];
        // var_dump($price);exit;
        // var_dump($price_promotion);exit;
        if(($price>=$price_promotion)){
            $product = $this->productRepository->create($input);

            if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('image', $name);
            $product->image = $name;
            }
            $product->save();
            Flash::success('Product saved successfully.');

            return redirect(route('products.index'));
        }
        else
        {
            Flash::error('The promotional price must be less than the original price');
            return view('products.create');
        }
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        $product = $this->productRepository->find($id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('image', $name);
            $product->image = $name;
            }
            $product->save();
        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param int $id
     * @param UpdateproductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('image', $name);
            $product->image = $name;
            }
            $product->save();

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}