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
                                                @foreach($feedbacks as $feedback)
                                                    <tr>
                                                        <td>{{ $feedback->id }}</td>
                                                        <td>{{ $feedback->name }}</td>
                                                        <td>{{ $feedback->email }}</td>
                                                        <td>{{ $feedback->phone }}</td>
                                                        <td>{{ $feedback->status }}</td>
                                                        <td>{{ $feedback->created_at }}</td>
                                                        <td>{{ $feedback->updated_at }}</td>
                                                        <td style="text-align:center;">
                                                            <a href="{{ route('feedbacks.edit', $feedback->id) }}" class="btn btn-success">Edit</a>
                                                            <form action="{{ route('feedbacks.destroy', $feedback->id)}}" method="post">
                                                                {{ csrf_field() }}
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                            </form>
                                                            <a href="{{ route('feedbacks.show', $feedback->id) }}" class="btn btn-info">View</a>
                                                            <a href="{{ route('info', $feedback->id) }}" class="btn btn-success">Logs</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
