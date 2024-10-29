@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 style="float: left">Add User </h4> 
                    <a href="#" style="float: right" class="btn btn-dark" datatoggle="modal" data-target="#addUser">
                         <i class="fa fa-plus"> </i> Add New User</a></div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                    
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user )                            
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>@if ($user->is_admin == 1) Admin
                                        @elseif ($user->is_admin == 2) Cashier
                                        @elseif ($user->is_admin == 3) Employee
                                        
                                    @endif</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editUser{{ $user->id }}"><i class="fa fa-edit"></i>Edit</a>
                                            <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUser{{ $user->id }}"><i class="fa fa-trash"></i>Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit user -->
<div class="modal right fade" id="editUser {{ $user->name }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ $user->id }}
        </div>
        <div class="modal-body">
            <form action="{{ route ('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" value="{{ $user->name }}" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" value="{{ $user->email }}" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" value="{{ $user->phone }}" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="Password" readonly value="{{ $user->password }}" id="" class="form-control"> 
             </div>
             {{-- <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control"> 
             </div> --}}
             <div class="form-group">
                <label for="">Role</label>
                <select name="is_admin" id="" class="form_control">
                    <option value="1" @if ($user->is_admin == 1)
                        selected
                    @endif>Admin</option>
                    <option value="2" @if ($user->is_admin == 2)
                        selected
                    @endif>cashier</option>
                    <option value="3" @if ($user->is_admin == 3)
                        selected
                    @endif>employee</option>
                </select>
             </div>
             <div class="modal-footer">
                <button class="btn btn-warning btn-block">Update User</button>
             </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- pass here here Edit model --}}


<!-- Modal Delete user -->
<div class="modal right fade" id="deleteUser {{ $user->name }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          {{ $user->id }}
        </div>
        <div class="modal-body">
            <form action="{{ route ('users.destroy', $user->id) }}" method="post">
            @csrf
            @method('delete')
            <p> Are you sure you want to Delete this user {{ $user->name }}?</p>
             
             
             <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
             </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- pass here here Delete model --}}


                                @endforeach

                            </tbody>
                        </table>
                    </div>
                
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="card">
                <div class="card-header"> <a href="#"> <i class="fa fa-plus"> </i> Search User</a>
                    <div class="card-body">
                        ''''''''''
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal add user -->
<div class="modal right fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route ('users.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Phone</label>
                <input type="text" name="phone" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="Password" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="" class="form-control"> 
             </div>
             <div class="form-group">
                <label for="">Role</label>
                <select name="is_admin" id="" class="form_control">
                    <option value="1">Admin</option>
                    <option value="2">cashier</option>
                    <option value="3">employee</option>
                </select>
             </div>
             <div class="modal-footer">
                <button class="btn btn-primary btn-block">Save User</button>
             </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{-- pass here here --}}


  <style>
    .modal.right .modal-dialog{
        top: 0;
        right: 0;
        margin-right: 19vh; 
         
    }
    .modal.fade::not(.in).right .modal-dialog {
        -webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0)
         
    }

   </style>

@endsection