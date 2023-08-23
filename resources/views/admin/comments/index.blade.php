@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">

    <form action="{{route('comment')}}" method="GET">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Serch by Name/Email/Phone Number" name="search" value="{{ request()->search }}">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
      </div>
    </form>

    
<div class="card">
  <h5 class="card-header">{{$pagetitle}}</h5>
 
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Your Website</th>
            <th>Message</th>
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
            @if(count($comments) > 0)
            @foreach($comments as $key => $comment)
          
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$comment->name}}</strong></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$comment->email}}</strong></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$comment->your_website}}</strong></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$comment->message}}</strong></td>
            @if($comment->status === 'approved')
            <td>Approved
              <a href="{{ route('comment.disapproved', $comment->id) }}" class="btn btn-danger btn-sm">Disapprove</a>
              @else
              <td>Disapproved
               
                <a href="{{ route('comment.approved', $comment->id) }}" class="btn btn-primary btn-sm">Approve</a>
            @endif

            </td>
            <td><a href="{{ route('comment.delete', $comment->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Comment?');">Delete</a></td>
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
    {{ $comments->links() }}
  </div>
</div>
  @endsection