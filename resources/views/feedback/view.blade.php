@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th class="text-center">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $id }}</td>
                                            <td>{{ $name }}</td>
                                            <td>{{ $email }}</td>
                                            <td>{{ $phone }}</td>
                                            <td>{{ $status }}</td>
                                            <td>{{ $created_at }}</td>
                                            <td>{{ $updated_at }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('feedbacks.edit', $id) }}" class="btn btn-success">Edit</a>
                                                <form action="{{ route('feedbacks.destroy', $id)}}" method="post">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
