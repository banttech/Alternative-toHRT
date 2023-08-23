@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{route('success_stories')}}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Serch by Customer Name/Description" name="search" value="{{ request()->search }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
      </div>
    </form>

    
<div class="card">
  <h5 class="card-header">{{$pagetitle}}</h5>
  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('success_stories.create') }}" class="btn btn-primary admin_allpage">Add Success Story</a>
</div>
    
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Description</th>
            <th>Customer Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        @if (Session::has('success'))
        <div class="alert alert-dark">
            {{ Session::get('success') }}
        </div>
    @endif
        <tbody class="table-border-bottom-0">
            @if(count($success_stories) > 0)
            @foreach($success_stories as $key => $success_storie)
            @php 
            $storiesDescriptionLength = Str::length($success_storie->description);
            @endphp  
          <tr>
            @if($storiesDescriptionLength>=50)
            <td>{!! substr($success_storie->description,0,50,).'...' !!}</td>
            @else
            <td>{!!substr($success_storie->description,0,50,)!!}</td>
            @endif
            <td>{{$success_storie->name}}</td>
            <td><a href="{{ route('success_stories.edit', $success_storie->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <a href="{{ route('success_stories.delete', $success_storie->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Story?');">Delete</a>
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
    {{ $success_stories->links() }}
  </div>
</div>
  @endsection