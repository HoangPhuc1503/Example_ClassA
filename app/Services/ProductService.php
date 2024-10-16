<?php

namespace App\Services;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Exception;

class ProductService
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getList()
    {
        return $this->product->all();
    }
    
    // public function getProduct($idProduct)
    // {
    //     return   $this->product($idProduct);
    // }

    

    public function delete($product)
    {
        try{
            $product = $this->product::find($product);
            if(!$product)
                return false;
                       
            return $product->delete($product);
        }catch(Exception $exception){
            log::error($exception);
            
            return false;
        }
    }


    
}