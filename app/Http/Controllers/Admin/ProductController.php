<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $pagetitle = 'Manage Products';
        $pageTitle = 'Alternative to HRT - Products';
        if ($request->has('search')) {
            $search = $request->get('search');
            $products = Product::with('category', 'brand')->orderBy('id', 'desc')->where('productname', 'like', '%' . $search . '%')
                ->orwhere('description', 'like', '%' . $search . '%')->orwhere('price', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')->paginate(20);
        } else {

            $products = Product::with('category', 'brand')->orderBy('id', 'desc')->paginate(20);
        }
        return view('admin.products.index', compact('products', 'pagetitle','pageTitle'));
    }

    public function create()
    {
        $pagetitle = 'Add Ptoduct';
        $pageTitle = 'Alternative to HRT - Add Ptoduct';
        $categorys = DB::table('productcategory')->get();
        $brands = DB::table('brand')->get();
        return view('admin.products.create', compact('pagetitle', 'categorys', 'brands','pageTitle'));
    }
    public function store(Request $request)    {
        
        $request->validate(
            [
                'productname' => 'required',
                'slug' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048|dimensions:max_width=800,max_height=800',
                'weight' => 'required',
                'price' => 'required|lt:reg_sel_price',
                'reg_sel_price' => 'required',
                'stockunit' => 'required',
                'height' => 'required',
                'width' => 'required',
                'length' => 'required',
                'description' => 'required',
                'seotitle' => 'required',
                'tags' => 'required',
                'status' => 'required',
                'metadescription' => 'required',
                // 'multiple_image' => 'image|mimes:jpg,png,jpeg,webp|max:2048|dimensions:max_width=800,max_height=800',
                // 'multiple_image.*' => 'image|mimes:jpg,png,jpeg,webp|max:2048|dimensions:max_width=800,max_height=800'
            ],
            [
                'productname.required' => 'Product name field is required',
                'slug.required' => 'Slug field is required',
                'image.required' => 'Image field is required',
                'image.dimensions' => "Image size can't exceeds the size 800px X 800px",
                'mimes' => 'Please upload valid image. Only JPG, JPEG, PNG and WEBP extensions are allowed.',
                'weight.required' => 'Product weight field is required',
                'price.required' => 'Price is required',
                'price.lt' => 'Price must be less than original price',
                'reg_sel_price.required' => 'Original Price field is required',
                'stockunit.required' => 'Stock field is required',
                'height.required' => 'Height field is required',
                'width.required' => 'Width field is required',
                'length.required' => 'Length field is required',
                'description.required' => 'Product description field is required',
                'seotitle.required' => 'Seo title field is required',
                'tags.required' => 'Tags is required',
                'metadescription.required' => 'Meta description field is required',
                // 'multiple_image.image' => 'Please upload valid image. Only JPG, JPEG, PNG and WEBP extensions are allowed.',
                // 'multiple_image.dimensions' => "Image size can't exceeds the size 800px X 800px",
                // 'multiple_image.*.image' => 'Please upload valid image. Only JPG, JPEG, PNG and WEBP extensions are allowed.',
                // 'multiple_image.*.dimensions' => "Image size can't exceeds the size 800px X 800px",

            ]
        );
        
        // dd($request->category_id);
        
        $image = $request->file('image');
        $name = time() . '_product.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('admin_assets/images');
        $image->move($destinationPath, $name);
        $featureimage = $name;

        $height = $request->height;
        $width = $request->width;
        $length = $request->length;
        $dimensions = $height . ',' . $width . ',' . $length;

        $imagesName = '';

        if ($request->hasFile('multiple_image')) {
            $image = $request->file('multiple_image');
            
           foreach ($image as $key => $files) {

            $destinationPath = public_path('admin_assets/images');
            $file_name = time() . $key . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $file_name);
                $data[] = $file_name;
           }
           

            $imagesName = implode(",", $data);

        }

        $product = DB::table('product')->insertGetId([

            'productname' => $request->productname,
            'slug' => Str::slug($request->slug, '-'),
            'product_category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'image' => $featureimage,
            'multiple_images' => $imagesName,
            'weight' => $request->weight,
            'price' => $request->price,
            'reg_sel_price' => $request->reg_sel_price,
            'stockunit' => $request->stockunit,
            'dimensions' =>  $dimensions,
            'description' => $request->description,
            'seotitle' => $request->seotitle,
            'tags' => $request->tags,
            'status' => $request->status,
            'metadescription' => $request->metadescription,

        ]);

        return redirect()->route('product')->with('success', 'Product added successfully');
    }
    public function edit($id)
    {
        $pagetitle = 'Edit Product';
        $pageTitle = 'Alternative to HRT - Edit Product';
        $products = DB::table('product')->where('id', $id)->first();

        $categorys = DB::table('productcategory')->get();
        $brands = DB::table('brand')->get();
        return view('admin.products.edit', compact('pagetitle', 'brands', 'products', 'categorys','pageTitle'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'productname' => 'required',
                'slug' => 'required',
                'weight' => 'required',
                'price' => 'required|lt:reg_sel_price',
                'reg_sel_price' => 'required',
                'stockunit' => 'required',
                'height' => 'required',
                'width' => 'required',
                'length' => 'required',
                'description' => 'required',
                'seotitle' => 'required',
                'tags' => 'required',
                'status' => 'required',
                'metadescription' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,webp|max:2048|dimensions:max_width=800,max_height=800',
            ],
            [
                'productname.required' => 'Product field name is required',
                'slug.required' => 'Slug field is required',
                'weight.required' => 'Product weight field is required',
                'price.required' => 'Price field is required',
                'price.lt' => 'Price must be less than original price',
                'reg_sel_price.required' => 'Original Price field is required',
                'stockunit.required' => 'Stock field is required',
                'height.required' => 'Height field is required',
                'width.required' => 'Width field is required',
                'length.required' => 'Length field is required',
                'description.required' => 'Product description field is required',
                'seotitle.required' => 'Seo title field is required',
                'tags.required' => 'Tags is field required',
                'metadescription.required' => 'Meta description field is required',
                'image.image' => 'The IMAGE field must be an image type.',
                'image.dimensions' => "Image size can't exceeds the size 800px X 800px",
                'mimes' => 'Please upload valid image. Only JPG, JPEG, PNG and WEBP extensions are allowed.'
            ]
        );
        $oldproduct = DB::table('product')->where('id', $id)->first();
      
        $featureimage='';
        if ($request->file('image')) {
        
            $image = $request->file('image');
            $name = time() . '_product.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('admin_assets/images');
            $image->move($destinationPath, $name);
            $featureimage = $name;
        }else{
            $featureimage = $oldproduct->image;
        }
        $height = $request->height;
        $width = $request->width;
        $length = $request->length;
        $dimensions = $height . ',' . $width . ',' . $length;

        $imagesName = '';
        // dd($request->multiple_image);
        if($request->multiple_image){
            $image = $request->multiple_image;
            $data = [];
            foreach ($image as $key => $files) {
                if(is_file($files)){
                    $destinationPath = public_path('admin_assets/images');
                    $file_name = time() . $key . "." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $file_name);
                    $data[] = $file_name;
                } else {
                    $data[] = $files;
                }
            }
            $imagesName = implode(",", $data);
        }

        $product = DB::table('product')->where('id', $id)->update([

            'productname' => $request->productname,
            'slug' => Str::slug($request->slug, '-'),
            'product_category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'image' => $featureimage,
            'multiple_images' => $imagesName,
            'weight' => $request->weight,
            'price' => $request->price,
            'reg_sel_price' => $request->reg_sel_price,
            'stockunit' => $request->stockunit,
            'dimensions' =>  $dimensions,
            'description' => $request->description,
            'seotitle' => $request->seotitle,
            'tags' => $request->tags,
            'status' => $request->status,
            'metadescription' => $request->metadescription,

        ]);
        return redirect()->route('product')->with('success', 'Product updated successfully');
    }

    public function delete($id)
    {
        DB::table('product')->where('id', $id)->delete();
        return redirect()->route('product')->with('success', 'Product deleted successfully');
    }
}
