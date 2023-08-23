@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{route('product')}}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Serch by Product Name/Description" name="search"
          value="{{ request()->search }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
      </div>
    </form>


    <div class="card">
      <h5 class="card-header">{{$pagetitle}}</h5>
      <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('product.create') }}" class="btn btn-primary admin_allpage">Add Product</a>
      </div>

      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th>Feature Image</th>
              {{-- <th>Multiple Image</th> --}}
              <th>Product Name</th>
              <th>Category</th>
              <th>Brand</th>
              <th>Description</th>
              <th>Weight</th>
              <th>Dimensions</th>
              <th>REGULAR PRICE (£)</th>
              <th>SALE PRICE (£)</th>
              <th>Stock Unit</th>
              <th>Seo Title</th>
              <th>Tags</th>
              <th>Meta Description</th>
              <th>Status</th>
              <th>Actions</th>

            </tr>
          </thead>
          @if (Session::has('success'))
          <div class="alert alert-dark">
            {{ Session::get('success') }}
          </div>
          @endif
          <tbody class="table-border-bottom-0">
            @if(count($products) > 0)
            @foreach($products as $key => $product)

            <tr>
              <td><img class="mt-2" src="{{ url('admin_assets/images/'.$product->image)}}" alt=" " width="100px"
                  height="100px" id="img" /></td>

                  {{-- <td><img class="mt-2" src="{{ url('admin_assets/images/'.$product->multiple_images)}}" alt=" " width="100px"
                    height="100px" id="img" /></td>
   --}}
              <td>{{$product->productname}}</td>

             <td>{{$product->category->categoryname}}</td>
             <td>{{$product->brand->brandname}}</td>

              @php
              $descriptonLength = Str::length($product->description);
              $metadescriptonLength = Str::length($product->description);
              @endphp

              @if($descriptonLength>=20)
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{!!
                  substr($product->description,0,20,)!!}</strong>
              </td>
              @else
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                  {!! substr($product->description,0,20,)!!}</strong></td>
              @endif

              <td>{{$product->weight}}</td>
              <td>{{$product->dimensions}}</td>
              <td>{{$product->reg_sel_price}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->stockunit}}</td>
              <td>{{$product->seotitle}}</td>
              <td>{{$product->tags}}</td>

              @if($metadescriptonLength>=20)
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{!!
                  substr($product->metadescription,0,20,)!!}</strong>
              </td>
              @else
              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                  {!! substr($product->metadescription,0,20,)!!}</strong></td>
              @endif

              @if($product->status=='Active')
              <td class="text-success">Active</td>
              @else
              <td class="text-danger">Inactive</td>
              @endif

              <td> <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <!-- <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger btn-sm"
                  onclick="return confirm('Are you sure you want to delete this Product');">Delete</a> -->
              </td>
            </tr>
            </tr>
            @endforeach
            @else

            <tr>
              <td colspan="9" class="text-center text-danger">No Record Found</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-3">
    {{ $products->links() }}
  </div>
</div>

@endsection