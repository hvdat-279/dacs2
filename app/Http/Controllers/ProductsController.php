<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::with(['category', 'images'])->orderBy('id', 'desc')->paginate(10);
        return view('partials.admin.product.indexProduct', compact('products'));
    }
    public function add()
    {
        $categories = Category::all(); // Lấy tất cả danh mục sản phẩm
        return view('partials.admin.product.addProduct', compact('categories'));
    }
    // Lưu sản phẩm mới
    public function create(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'required|string',
                'stock' => 'required|integer',
                'category_id' => 'required|exists:categories,id',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'title.required' => 'Vui lòng nhập tên sản phẩm.',
                'title.string' => 'Tên sản phẩm phải là một chuỗi văn bản.',
                'title.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

                'price.required' => 'Vui lòng nhập giá sản phẩm.',
                'price.numeric' => 'Giá sản phẩm phải là một số.',

                'description.required' => 'Vui lòng nhập mô tả sản phẩm.',
                'description.string' => 'Mô tả sản phẩm phải là một chuỗi văn bản.',

                'stock.required' => 'Vui lòng nhập số lượng sản phẩm.',
                'stock.integer' => 'Số lượng sản phẩm phải là một số nguyên.',

                'category_id.required' => 'Vui lòng chọn danh mục sản phẩm.',
                'category_id.exists' => 'Danh mục sản phẩm không tồn tại.',

                'images.*.image' => 'Các tệp tải lên phải là hình ảnh.',
                'images.*.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
                'images.*.max' => 'Kích thước hình ảnh không được vượt quá 2048KB.',
            ]
        );

        // Tạo sản phẩm mới với các trường cần thiết
        $product = Products::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Lưu ảnh vào thư mục public/product_images
                $path = $image->store('product_images', 'public');
                // Lưu thông tin ảnh vào bảng product_images
                $product->images()->create([
                    'img' => basename($path), // Lưu tên ảnh
                ]);
            }
        }


        // Chuyển hướng về danh sách sản phẩm và thông báo thành công
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được thêm.');
    }
    // Hiển thị form sửa sản phẩm
    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $categories = Category::all(); // Lấy tất cả danh mục sản phẩm
        return view('partials.admin.product.editProduct', compact('product', 'categories'));
    }

    // Cập nhật thông tin sản phẩm
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Products::findOrFail($id);
        $product->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được cập nhật.');
    }

    // Xóa sản phẩm
    public function delete($id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được xóa.');
    }
}
