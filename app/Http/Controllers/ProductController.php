<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;
//use Debugbar;


class ProductController extends Controller
{
    protected $productRepositoryInterface;
    
    protected $nbrPerPage = 12;
    
    
    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {                
        $products = $this->productRepositoryInterface->getPaginate($this->nbrPerPage);
        
        //return response()->json($products);
        
        return $products;                
    }

    /**
     * Display a custom listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $products = array();
        $pagination = $this->nbrPerPage;
        
        if(isset($request))
        {
            $product_name = $request->input(['productSearch']);
            $category_id = $request->input(['categorySearch']);
            $pagination = $request->input(['pagination']);
            
            if($product_name == "") $product_name = null;
            if($category_id == "") $category_id = null;
            
            if(is_null($category_id) && is_null($product_name))
            {
                $products = $this->productRepositoryInterface->getPaginate($pagination);
            }
            else if (isset($category_id) && is_null($product_name))
            {
                $products = $this->productRepositoryInterface->getPaginateCategory($pagination,$category_id);
                
            }
            else if (is_null($category_id) && isset($product_name))
            {
                $products = $this->productRepositoryInterface->getPaginateProduct($pagination,$product_name);
            }
            else if (isset($product_name) && isset($product_name))
            {
                $products = $this->productRepositoryInterface->getPaginateCategoryProduct($pagination,$category_id,$product_name);
            }
            else
            {
                // nothing
            }
        }
        else
        {
            $products = $this->productRepositoryInterface->getPaginate($pagination);
        }
        
        return $products;
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get product
        $product = $this->productRepositoryInterface->getById($id);

        return $product;
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