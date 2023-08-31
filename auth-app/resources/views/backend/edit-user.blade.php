@extends('backend.master')

@section('main-content')
<div class="card mb-4">
    <div class="card-header">
        Edit User
    </div>
</div>

    <div class="row">

        <div class="col-sm-6 col-lg-6 col-md-6 offset-3">

            
            <form action="{{ Route('user.update' , $user->id ) }}" method="post" class="shadow p-5">
                @csrf
                <h2 class="text-center text-primary">Edit User</h2>

                <div class="form-group mb-3">

                    <label for="name">Name</label>
                    <input type="text" name="u_name" id="name" value="{{ $user->name }}" class="form-control">
    
                </div>

                <div class="form-group mb-5">
    
                    <label for="email">Email</label>
                    <input type="email" name="u_email" id="email" value="{{ $user->email }}" class="form-control">
    
                </div>

                <div class="form-group">
    
                   <input type="submit" value="Update User" class="w-100 btn btn-success">
    
                </div>
            </form>

          


        </div>

    

@endsection