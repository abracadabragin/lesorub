<?php

namespace Lesorub\Http\Controllers;

use Lesorub\Http\Requests\ProductRequest;
use Lesorub\Product;
use Lesorub\ProductPhoto;
use Lesorub\Feedback;
use Lesorub\FeedbackPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::all();

        $params['discounts'] = [];
        $params['baths'] = [];
        $params['houses'] = [];
        $params['feedbacks'] = [];
        foreach ($products as $product) {

            $productPhotos = ProductPhoto::all()->where('product_id', $product->id);

            $filenames = [];

            foreach ($productPhotos as $photo) {

                array_push($filenames, substr($photo->filename, strpos($photo->filename, '/')));

            }

            $product->photos = $filenames;
            if (!is_null($product->discount)) {
                array_push($params['discounts'], $product);
            }
            if ($product->type === 'bath') {
                array_push($params['baths'], $product);
            }
            elseif ($product->type === 'house') {
                array_push($params['houses'], $product);
            }

        }

        $feedbacks = Feedback::all();

        foreach ($feedbacks as $feedback) {
            $feedback->author_photo = substr($feedback->author_photo, strpos($feedback->author_photo, '/'));

            array_push($params['feedbacks'], $feedback);
        }

        return view('index')->with(compact('params'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Lesorub\Http\Requests\ProductRequest
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        $product->discount = $request->has('discount') ? true : null;
        $product->save();

        foreach ($request->photos as $photo) {

            $filename = $photo->store('public/photos');

            ProductPhoto::create([
                'product_id' => $product->id,
                'filename' => $filename
            ]);

        }

        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Lesorub\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $photos = ProductPhoto::all()->where('product_id', $product->id);

        $filenames = [];

        foreach ($photos as $photo) {

            $filename = substr($photo->filename, strpos($photo->filename, '/'));
            $url = asset("storage" . $filename);
            array_push($filenames, $url);

        }

        $product->photos = $filenames;

        return response(compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Lesorub\Product $product
     * @param  \Lesorub\Http\Requests\ProductRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Lesorub\Http\Requests\ProductRequest $request
     * @param  \Lesorub\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->discount = $request->has('discount') ? true : null;
        $product->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Lesorub\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $photos = ProductPhoto::all()->where('product_id', $product->id);

        foreach ($photos as $photo) {
            Storage::delete($photo->filename);
        }

        $product->delete();

        return redirect('/');
    }
}
