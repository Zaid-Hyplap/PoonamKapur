@extends('layouts.admin')

@section('title')
Roles
@endsection

@section('header')

@endsection

@section('content')

<!-- Adding Roles modal -->

<div class=" col-sm-12 text-right">
    <button type="button" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#exampleModalLong"> Create Role </button>
</div>

<!--Roles Modal-->
<div class="modal fade" id="exampleModalLong" data-backdrop="static" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/role/addRole')}}" method="post">
                    @csrf
                    <div id="error_msg"></div>
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Name">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Role Status <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <optgroup label="Status">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Deactive</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 modal-footer">
                            <button type="submit" class="btn btn-primary">Add Role</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="col-sm-12">
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
</div>
@endif
@endforeach
@if ($errors->any())
<div class="col-sm-12">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endforeach
</div>
@endif

<!-- role table -->

<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Roles</h5>
        </div>
        <div class="card-body">

            <div>
                <table class="table table-bordered table-hover table-checkable table-responsive-lg" id="tabdata" style="margin-top: 13px !important">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $list )

                        <tr>
                            <td class="align-middle text-center">{{$i}}</td>
                            @php($i++)
                            <td class="align-middle text-center">{{$list->id}}</td>
                            <td class="align-middle text-center">{{$list->name}}</td>
                            <td class="align-middle text-center">
                                @if($list->status == 1)
                                <span style="color: green;">Active</span>
                                @else
                                <span style="color: red;">Inactive</span>
                                @endif
                            </td>
                            <td class="table-action">
                                <div class="align-middle text-center">
                                    <a href="" class="btn btn-icon btn-outline-primary has-ripple" data-toggle="modal" data-target="#showModal{{$list->id}}"><i class="far fa-eye"></i> </a>
                                    <a href="" class="btn btn-icon btn-outline-warning has-ripple" data-toggle="modal" data-target="#editModal{{$list->id}}"><i class="fas fa-pen"></i></a>
                                    <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$list->id}}"><i class="far fa-trash-alt"></i></a>

                                </div>

                            </td>
                            <!--Show Modal -->
                            <div class="modal fade" id="showModal{{$list->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Role Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">
                                            <form action="" method="get">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Id</label><br>
                                                            <label for="Name">{{$list->id}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Name</label><br>
                                                            <label for="Name">{{$list->name}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Activity Status</label><br>
                                                            <label for="Name">
                                                                @if($list->status == 1)
                                                                <span style="color: green;">Active</span>
                                                                @else
                                                                <span style="color: red;">Inactive</span>
                                                                @endif
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Edit Modal -->
                            <div class="modal fade" id="editModal{{$list->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Edit Role</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">
                                            <form action="{{url('/role/editRole')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="hiddenId" value="{{$list->id}}">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Name <span style="color: red;">&#42</span></label>
                                                            <input type="text" class="form-control" id="Name" name="name" value="{{$list->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Status <span style="color: red;">&#42</span></label>

                                                            <select class="js-example-basic-single form-control" style="width: 100%" name="status">
                                                                <optgroup label="Current Status">
                                                                    @if($list->status == 1)
                                                                    <option selected value="1">Active</option>
                                                                    @else
                                                                    <option selected value="0">Inactive</option>
                                                                    @endif
                                                                </optgroup>
                                                                <optgroup label="Change Status">
                                                                    <option value="1">Active</option>
                                                                    <option value="0">Deactive</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 modal-footer">
                                                    <button type="submit" class="btn btn-primary">Edit Role</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Delete Modal -->
                            <div class="modal fade" id="deleteModal{{$list->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>

                                        <form action="{{url('/role/deleteRole')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$list->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this role? <br> ACTION CAN NOT BE REVERTED </p>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection