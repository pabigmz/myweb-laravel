@extends('users.layouts')
@section('title')
    Users
@endsection
@section('content')
    @if (count($users) > 0)
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Users List</div>
                    <div class="text text-center card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">S#</th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{route('delete',$user->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure Delete {{$user->name}} ?');">Delete</a>
                                        </td>
                                    </tr>
                                @empty

                                    <td colspan="6">
                                        <span class="text-danger">
                                            <strong>No Product Types Found!</strong>
                                        </span>
                                    </td>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $users->links() !!}


                    </div>
                </div>
            </div>
        </div>
    @else
        <h2 class="text text-center py-4">Not Data</h2>
    @endif
@endsection
