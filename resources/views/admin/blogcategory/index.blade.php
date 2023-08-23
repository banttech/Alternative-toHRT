@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{route('blogcategory')}}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Serch by Category Name" name="search" value="{{ request()->search }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
      </div>
    </form>

    
<div class="card">
  <h5 class="card-header">{{$pagetitle}}</h5>
  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('blogcategory.create') }}" class="btn btn-primary admin_allpage">Add Blog Category</a>
</div>
    
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Category Name</th>
            <th>Actions</th>
           
          </tr>
        </thead>
        @if (Session::has('success'))
        <div class="alert alert-dark">
            {{ Session::get('success') }}
        </div>
    @endif
        <tbody class="table-border-bottom-0">
            @if(count($blogcategorys) > 0)
            @foreach($blogcategorys as $key => $blogcategory)
          
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$blogcategory->categoryname}}</strong></td>
            
            <td><a href="{{ route('blogcategory.edit', $blogcategory->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <a href="{{ route('blogcategory.delete', $blogcategory->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Category?');">Delete</a>
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
    {{ $blogcategorys->links() }}
  </div>
</div>
  @endsection