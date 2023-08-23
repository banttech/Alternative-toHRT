@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

   
<div class="card">
  <h5 class="card-header">{{$pagetitle}}</h5>
  <div class="d-flex justify-content-end mb-2">
    @if(count($terms_conditions)>0)
    
      @else
      <a href="{{ route('terms-conditions.create') }}" class="btn btn-primary admin_allpage">Add Terms And Conditions</a>
    @endif 
</div>
    
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Terms And Conditions</th>
          
            <th>Actions</th>
          </tr>
        </thead>
        @if (Session::has('success'))
        <div class="alert alert-dark">
            {{ Session::get('success') }}
        </div>
    @endif
        <tbody class="table-border-bottom-0">
            @if(count($terms_conditions) > 0)
            @foreach($terms_conditions as $key => $terms_condition)
            @php 
            $terms_conditionsLength = Str::length($terms_condition->terms_conditions);
            @endphp  
          <tr>
            @if($terms_conditionsLength>=50)
            <td>{!! substr($terms_condition->terms_conditions,0,50,).'...' !!}</td>
            @else
            <td>{!!substr($terms_condition->terms_conditions,0,50,)!!}</td>
            @endif
            
            <td><a href="{{ route('terms-conditions.edit', $terms_condition->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <a href="{{ route('terms-conditions.delete', $terms_condition->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Terms and Conditions?');">Delete</a>
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
    {{ $terms_conditions->links() }}
  </div>
</div>
  @endsection