@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div id="message-login" class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{Session::get('success')}}
    </div>
    @endif
    <div class="row justify-content-center text-center table-responsive p-3">
        <table class="table table-bordered bg-white">
            <tr class="table-success">
                <td>User Name</td>
                <td>Email</td>
                <td>Address</td>
                <td>Zip code</td>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->zip_code }}</td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="row justify-content-center p-5">
        <form action="" method="post" class="form-group" style="width: 400px; border:1px solid black; padding: 20px">
            @csrf
            <div class="text-center" style="font-size: 18px;">
                <label>Update Information</label>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" placeholder="Address">
            </div>
            <div class="form-group">
                <label for="zipcode">Zip code</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip code">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function() {
        $('#message-login').delay(3000).fadeOut();
    });
</script>
@endsection