<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\UpdateProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService= $productService;
    }

    public function index(){
        $products = $this->productService->getList();
        
        return view(view:'products.list', data :['Items' => $products]);
    }

    public function show(Product $Product){
        // $products = $this->productService->getList();
        
        return view(view:'products.show', data :['Items' => $Product]);
    }

    
    public function delete(Product $product) {
        $result = $product->delete(); // Xóa sản phẩm
    
        if ($result) {
            $products = $this->productService->getList(); // Lấy danh sách sản phẩm mới
            return view('products.list', ['Items' => $products]); // Trả về view với danh sách sản phẩm
        }
        
        return response()->json([
            'message' => 'Đã xảy ra lỗi khi xóa sản phẩm' // Thông báo lỗi
        ]);
    }
    


    public function update(UpdateProductRequest $updateProductRequest,Product $product)
    {


        $request = $updateProductRequest->validated();
        $result = $product->update($request);

        if ($result) {
            return redirect()->route('items.index')->with('success', 'Sản phẩm đã được cập nhật thành công.');
        }

        return response()->json([
            'message' => 'Đã xảy ra lỗi khi tạo nhiệm vụ'
        ]);

    }

}
