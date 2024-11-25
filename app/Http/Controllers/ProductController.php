<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        // Get the search keyword from the request
        $keyword = $request->input('keyword');

        // Start the query for products
        $query = Product::with(['brand', 'category']);

        // If a keyword is provided, apply the search conditions
        if ($keyword) {
            // return $keyword;
            $query->where('name', 'like', "%{$keyword}%")
            ->orWhere('price', 'like', "%{$keyword}%")
            ->orWhere('stock', 'like', "%{$keyword}%")
            ->orWhereHas('category', function (Builder $q) use ($keyword) {
                $q->where('category_name', 'like', "%{$keyword}%");
            });
        }

        // Paginate the results
        $products = $query->with('category')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->orderBy('categories.category_name', 'asc')
            ->select('products.*')
            ->paginate(10);

        // Format the results
        $formattedProducts = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'brand' => $product->brand ? $product->brand->brand_name : null, // Display brand name, null if not found
                'category' => $product->category ? $product->category->category_name : null, // Display category name, null if not found
                'price' => $product->price,
                'stock' => $product->stock
            ];
        });

        // Return the paginated products as JSON
        return response()->json([
            'data' => $formattedProducts,
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
            'per_page' => $products->perPage(),
            'total' => $products->total(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'brand_id' => 'required|exists:brands,id', 
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'brand_id.exists' => 'Brand yang dipilih tidak valid.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'stock.required' => 'Stok produk wajib diisi.',
            'stock.integer' => 'Stok harus berupa bilangan bulat.',
        ]);
        Product::create($request->all());
        return response()->json(['message' => 'Produk berhasil disimpan'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $products = Product::findOrFail($id);
        return response()->json($products);

        // if ($products) {
        //     return response()->json(['product' => $products]);
        // } else {
        //     return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'brand_id' => 'sometimes|exists:brands,id',
            'category_id' => 'sometimes|exists:categories,id',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        $product->update($request->all());
        return response()->json([
            'message' => 'Produk berhasil diperbarui.',
        ], 200);

        // if(!$product) {
        //     return response()->json(['message'=>'Produk tidak ditemukan'], 404);
        // }

        // $product->update($validateData);
        // return response()->json(['message' => 'Produk berhasil diupdate', 'product' => $product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);

        // if(!$product) {
        //     return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        // }

        $product->delete();
        return response()->json([
            'message' => 'Produk berhasil dihapus.',
        ], 200);
    }
}
