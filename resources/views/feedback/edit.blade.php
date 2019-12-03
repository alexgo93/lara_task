@extends('layouts.app')

@section('content')
    <h2 style="margin-top: 12px;" class="text-center">Edit Feedback</h2>
    <br>

    <form action="{{ route('feedbacks.update', $id) }}" method="POST" name="update_feedback">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $name }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Phone</strong>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone" value="{{ $phone }}">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Product Code</strong>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" value="{{ $email }}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Message</strong>
                    <textarea class="form-control" col="4" name="message" placeholder="Enter Message" >{{ $message }}</textarea>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
