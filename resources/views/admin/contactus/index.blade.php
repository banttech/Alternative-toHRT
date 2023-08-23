@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <form action="{{route('contact')}}" method="GET" anct>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Serch by Name/Email" name="search" value="{{ request()->search }}">
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
                    <th>message</th>
                    <th>Action</th>

                </tr>
            </thead>
            @if (Session::has('success'))
            <div class="alert alert-dark">
                {{ Session::get('success')}}
            </div>
            @endif
            <tbody class="table-border-bottom-0">
                @if(count($contacts) > 0)
                @foreach($contacts as $key => $contact)

                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$contact->name}}</strong></td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->message}}</td>

                    <td><a href="{{ route('contact.delete', $contact->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Message?');">Delete</a>
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
    {{ $contacts->links() }}
</div>
</div>
@endsection
