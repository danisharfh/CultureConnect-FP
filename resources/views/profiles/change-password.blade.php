@extends('layouts.apps')

@section('content')

    <div class="mx-5 px-2">
    <form method="POST" action="{{ route('update.password', $user->username) }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
            <div class="container mx-5">
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Old Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="password" name="oldpassword" class="form-control" value="" required>
                        @error('oldpassword')
                        <p class="mt-1 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">New Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="password" name="password" class="form-control" value="" required>
                        @error('password')
                        <p class="mt-1 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Confirm Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="password" name="password_confirmation" class="form-control" value="" required>
                        @error('password_confirmation')
                        <p class="mt-1 text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-push-3 col-sm-push-3 col-xs-push-0">
                        <input class="btn btn-primary" type="submit" value="Update Password">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
