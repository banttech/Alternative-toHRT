@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

   
<div class="card">
  <h5 class="card-header">{{$pagetitle}}</h5>
  <div class="d-flex justify-content-end mb-2">
    @if(count($privacy_policys)>0)
    
    @else
    <a href="{{ route('privacy-policy.create') }}" class="btn btn-primary admin_allpage">Add Privacy Policy</a>
  @endif 

    
</div>
    
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Privacy Policy</th>
          
            <th>Actions</th>
          </tr>
        </thead>
        @if (Session::has('success'))
        <div class="alert alert-dark">
            {{ Session::get('success') }}
        </div>
    @endif
        <tbody class="table-border-bottom-0">
            @if(count($privacy_policys) > 0)
            @foreach($privacy_policys as $key => $privacy_policy)
            @php 
            $privacy_policyLength = Str::length($privacy_policy->privacy_policy);
            @endphp  
          <tr>
            @if($privacy_policyLength>=50)
            <td>{!! substr($privacy_policy->privacy_policy,0,50,).'...' !!}</td>
            @else
            <td>{!!substr($privacy_policy->privacy_policy,0,50,)!!}</td>
            @endif
            
            <td><a href="{{ route('privacy-policy.edit', $privacy_policy->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <a href="{{ route('privacy-policy.delete', $privacy_policy->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Privacy Policy?');">Delete</a>
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
    {{ $privacy_policys->links() }}
  </div>
</div>
  @endsection