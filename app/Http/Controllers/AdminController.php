<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade\Pdf;



class AdminController extends Controller
{
     /**
     * category page.
     */
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

     /**
     * add category.
     */
    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Added Successfully');
        return redirect()->back();
    }

     /**
     * Delete category.
     */
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Deleted Successfully');
        return redirect()->back();
    }

     /**
     * Add Product.
     */
    public function add_product()
    {
        $category =Category::all();
        return view('admin.add_product',compact('category'));
    }

     /**
     * Update Product.
     */
    public function upload_product(Request $request)
    {
        $data =new Product;
        $data->product_name = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;
        $image = $request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();
    }

     /**
     * view Poduct.
     */
    public function view_product()
    {
        $product = Product::paginate(16);
        return view('admin.view_product',compact('product'));
    }

     /**
     * delete product.
     */
    public function delete_product($id)
    {
        try {
            $data = Product::find($id);
    
            // Soft delete related orders
            Order::where('product_id', $id)->delete();
    
            $image_path = public_path('products/' . $data->image);
    
            if (file_exists($image_path)) {
                unlink($image_path);
            }
    
            $data->delete();
    
            toastr()->timeOut(10000)->closeButton()->addSuccess('Product Deleted Successfully');
        } catch (\Exception $e) {
            toastr()->error('An error occurred: ' . $e->getMessage());
        }
    
        return redirect()->back();
    }
    
    /**
     * update Product.
     */
    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('data','category'));
    }

     /**
     * edit Product.
     */
    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->product_name = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Successfully');
        return redirect('/view_product');
    }

     /**
     * Search product.
     */
    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('product_name','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.view_product',compact('product'));
    }

     /**
     * view Order.
     */
    public function view_order()
    {
        $data= Order::paginate(10);
        return view('admin.order',compact('data'));
    }

     /**
     * on the way button.
     */
    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status='On the way';
        $data->save();
        return redirect('/view_order');
    }

     /**
     * delivered button.
     */
    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status='Delivered';
        $data->save();
        return redirect('/view_order');
    }

     /**
     * print pdf.
     */
    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }

     /**
     * status search.
     */
    public function status_search(Request $request)
    {
        $search = $request->search;
        $data = Order::where('status', 'LIKE', '%' . $search . '%')
        ->orWhere('name', 'LIKE', '%' . $search . '%')
        ->orWhere('payment_status', 'LIKE', '%' . $search . '%')
        ->paginate(10);
        return view('admin.order',compact('data'));
    }

     /**
     * category search.
     */
    public function search_category(Request $request)
    {
        $search = $request->search;
        $data = Category::where('category_name', 'LIKE', '%' . $search . '%')->paginate(10);
        return view('admin.category',compact('data'));
    }   
}
