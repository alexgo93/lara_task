@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Feedback admin  <a href="/feedback/create" class="btn btn-success"> + Create</a></div>
                                        <div class="panel-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Message</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($feedbacks as $feedback)
                                                    <tr>
                                                        <td>{{ $feedback->id }}</td>
                                                        <td>{{ $feedback->name }}</td>
                                                        <td>{{ $feedback->email }}</td>
                                                        <td>{{ $feedback->phone }}</td>
                                                        <td>{{ $feedback->message }}</td>
                                                        <td>{{ $feedback->status }}</td>
                                                        <td style="text-align:right;">
                                                            <a href="/feedback/{{ $feedback->id }}" class="btn btn-info">View</a>
                                                            <a href="/feedback/{{ $feedback->id }}/edit" class="btn btn-success">Edit</a>
                                                            <a href="/feedback/{{ $feedback->id }}/destroy" class="btn btn-danger">Delete</a>
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
            </div>
        </div>
    </div>
@endsection
