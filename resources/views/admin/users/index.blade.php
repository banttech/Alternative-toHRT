@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{route('user')}}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Serch by First Name/Last Name/Email" name="search" value="{{ request()->search }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
      </div>
    </form>

    
<div class="card">
  <h5 class="card-header">{{$pagetitle}}</h5>
  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('user.create') }}" class="btn btn-primary admin_allpage">Add User</a>
</div>
    
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
          </tr>
        </thead>
        @if (Session::has('success'))
        <div class="alert alert-dark">
            {{ Session::get('success') }}
        </div>
    @endif
        <tbody class="table-border-bottom-0">
            @if(count($users) > 0)
            @foreach($users as $key => $user)
           
          <tr>
            <td>{{$user->firstname}}</td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->email}}</td>
            <td><a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
              <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this User?');">Delete</a>
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
    {{ $users->links() }}
  </div>
</div>
  @endsection