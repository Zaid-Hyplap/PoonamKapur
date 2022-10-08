@extends('layouts.admin')

@section('title', 'Booking')

@section('header')

@endsection

@section('content')


<!-- Adding Booking modal -->

<div class=" col-sm-12 text-right">
    <button type="button" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#addModal">
        <i class="fas fa-plus"></i> Add Bookings
    </button>
</div>

<div class="modal fade" id="addModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Create Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" style="font-size: 25px; "></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/booking/addBooking')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">User Id <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="userId" id="userId" data-live-search="true">
                                    <optgroup label="Users">
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Dietcian Id <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="dietcianId" id="dietcianId" data-live-search="true">
                                    <optgroup label="Dieticians">
                                        @foreach($dieticians as $dietician)
                                        <option value="{{$dietician->id}}">{{$dietician->name}}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Name">Consult Date <span style="color: red;">&#42</span></label>
                                <input type="date" class="form-control" id="consultDate" name="consultDate" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Name">Consult Time<span style="color: red;">&#42</span></label>
                                <input type="time" class="form-control" id="consultTime" name="consultTime" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Payment Status <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="paymentStatus" id="paymentStatus">
                                    <optgroup label="Status">
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Booking Status <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <optgroup label="Status">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>


                        <div class="col-sm-12 modal-footer">
                            <button type="submit" id="addBtn" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Bookings
                            </button>
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


<!-- table section -->

<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Bookings</h5>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="tabdata" class="table table-striped table-bordered nowrap">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <th>UserId</th>
                            <th>DietcianId</th>
                            <th>Consult Date</th>
                            <th>Consult Time</th>
                            <th>Payment Status</th>
                            <th>Booking Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $data )
                        <tr>
                            <td class="align-middle text-center">{{$i++}}</td>
                            <td class="align-middle text-center">{{$data->userId}}</td>
                            <td class="align-middle text-center">{{$data->dieticianId}}</td>
                            <td class="align-middle text-center">{{$data->consultDate}}</td>
                            <td class="align-middle text-center">{{$data->consultTime}}</td>
                            <td class="align-middle text-center">
                                <input type="checkbox" data-id="{{$data->id}}" class="toggle-class" data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{ $data->status == '1' ? 'checked' : ''}}>
                            </td>
                            <td class="table-action text-center">
                                <div>
                                    <!-- <a href="" class="btn btn-icon btn-outline-primary has-ripple" data-toggle="modal" data-target="#showModal{{$data->id}}"><i class="far fa-eye"></i><span class="ripple ripple-animate" style="height: 45px; width: 45px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: 7.39999px; left: -12.6px;"></span></a> -->
                                    <a href="" class="btn btn-icon btn-outline-warning has-ripple" data-toggle="modal" data-target="#updateModal{{$data->id}}"><i class="fas fa-pen"></i></a>
                                    <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></a>

                                </div>
                            </td>

                            <!--Update Modal -->
                            <div class="modal fade" id="updateModal{{$data->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Update Dietician</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">
                                            <form action="{{url('/booking/updateBooking')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">User Id <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="userId" id="userId" data-live-search="true">
                                                                <optgroup label="Users">
                                                                    @foreach($users as $user)
                                                                    <option value="{{$user->id}}" {{$data->userId  == $user->id ? 'selected' : ''}} >{{$user->name}}</option>
                                                                    @endforeach>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Dietcian Id <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="dietcianId" id="dietcianId" data-live-search="true">
                                                                <optgroup label="Dieticians">
                                                                    @foreach($dieticians as $dietician)
                                                                    <option value="{{$dietician->id}}" {{$data->dieticianId  == $dietician->id ? 'selected' : ''}} >{{$dietician->name}}</option>
                                                                    @endforeach
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Consult Date <span style="color: red;">&#42</span></label>
                                                            <input type="date" class="form-control" id="consultDate" name="consultDate" value="{{$data->consultDate}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Consult Time<span style="color: red;">&#42</span></label>
                                                            <input type="time" class="form-control" id="consultTime" name="consultTime" value="{{$data->consultTime}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Payment Status <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="paymentStatus" id="paymentStatus">
                                                                <optgroup label="Status">
                                                                    <option value="paid" {{$data->paymentStatus == 'paid' ? 'selected' : ''}}>Paid</option>
                                                                    <option value="unpaid" {{$data->paymentStatus == 'unpaid' ? 'selected' : ''}}>Unpaid</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Booking Status <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="status" id="status">
                                                                <optgroup label="Status">
                                                                    <option value="1" {{$data->status == 1 ? 'selected' : ''}} >Active</option>
                                                                    <option value="0" {{$data->status == 0 ? 'selected' : ''}} >InActive</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                            Update Booking
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Delete Modal -->
                            <div class="modal fade" id="deleteModal{{$data->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>

                                        <form action="{{url('/booking/deleteBooking')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this Booking? <br> ACTION CAN NOT BE REVERTED </p>
                                                <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-trash-alt" style="font-size: 20px;"></i>Delete
                                                    </button>
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
<script>
    $('.toggle-class').on('change', function() {
        var status = $(this).prop('checked') == true ? '1' : '0';
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: "{{url('/booking/status')}}",
            data: {
                'status': status,
                'user_id': user_id,
            },
            dataType: "json",
            success: function(data) {

            }
        });
    });
</script>

<script>
    var namee = document.getElementById("Name");
    var description = document.getElementById("Description");

    namee.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Booking Name is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Booking Name Too short');
        } else if (event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Only Alphabets are allowed');
        }
    })
    namee.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })
    description.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Booking is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Booking Too short');
        }
    })
    description.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })
</script>

<script>
    function getId(id) {
        var enamee = document.getElementById("EName" + id);
        var edescription = document.getElementById("EDescription" + id);

        enamee.addEventListener('invalid', function(event) {
            if (event.target.validity.valueMissing) {
                event.target.setCustomValidity('Booking Name is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Booking Name Too short');
            } else if (event.target.validity.patternMismatch) {
                event.target.setCustomValidity('Only Alphabets are allowed');
            }
        })
        enamee.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
        edescription.addEventListener('invalid', function(event) {
            if (event.target.validity.valueMissing) {
                event.target.setCustomValidity('Booking is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Booking Too short');
            }
        })
        edescription.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
    }
</script>
@endsection