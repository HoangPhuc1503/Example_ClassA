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

    // public function create($request)
    // {
    //     try{
    //         return $this->product->create($request);                      
            
    //     }catch(Exception $exception){
    //         log::error($exception);
            
    //         return false;
    //     }
    // }
    public function create($request) 
    {
        try {
            // Tạo sản phẩm mới và trả về kết quả
            return $this->product->create($request);
        } catch (Exception $exception) {
            // Ghi log lỗi
            Log::error($exception);

            // Trả về false để cho biết có lỗi xảy ra
            return false;
        }
    }

}