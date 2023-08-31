@extends('backend.master')

@section('main-content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
         Display Users
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#Sl</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                
                </tr>
            </tfoot>
            <tbody>

                @php

                    $x = 1;

                @endphp
                
                @if(count($users) > 0)

                    @foreach($users as $user)
                        
                        <tr>
                            <td>{{ $x++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ Route('user.edit', $user->id) }}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ Route('user.delete', $user->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
        
                            </td>
                        </tr>

                    @endforeach

                @endif

            
            </tbody>
        </table>
    </div>
</div>
@endsection