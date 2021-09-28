<?php

namespace App\Http\Controllers\Api;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    private $product;

    /**
     * Método construtor.
     */
    public function __construct(Product $product)
    {
        $this->product = $product;        
    }

    /**
     * Método de listagem de produtos.
     */
    public function index()
    {
        $products = $this->product->all();

        return response()->json($products);
    }

    /**
     * Método para recuperar um produto.
     */
    public function show($id)
    {
        $product = $this->product->find($id);

        return response()->json($product);
    }

    /**
     * Método para salvar o produto.
     */
    public function save(Request $request)
    {
        $data = $request->all();
        $product = $this->product->create($data);


        return response()->json($product);
    }

     /**
     * Método para salvar o produto.
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $product = $this->product->find($data['id']);
        $product->update($data);

        return response()->json($product);
    }

     /**
     * Método para excluir o produto.
     */
    public function delete($id)
    {
        $product = $this->product->find($id);
        $product->delete();

        return response()->json(['data' => ['msg' => 'Produto deletado com sucesso']]);ts
    }
}
