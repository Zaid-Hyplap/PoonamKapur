@extends('layouts.admin')

@section('title', 'Pincode')

@section('header')

@endsection

@section('content')


<!-- Adding Pincode modal -->

<div class=" col-sm-12 text-right">
    <button type="button" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#addModal">
        <i class="fas fa-plus"></i> Add Pincode
    </button>
</div>

<div class="modal fade" id="addModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Create Pincode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" style="font-size: 25px; "></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/pincode/addPincode')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">


                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Name">Area name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Number">Pincode <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" id="pincode" name="pincode" maxlength="6" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Number">Delivery Charge <span style="color: red;">&#42</span></label>
                                <input type="number" class="form-control" id="deliveryCharge" name="deliveryCharge" maxlength="6" required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="" style="font-size: 17px; font-weight: 600;">Availaibility</label>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Breakfast <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="breakFast" id="breakFast">
                                    <optgroup label="Status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Lunch <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="lunch" id="lunch">
                                    <optgroup label="Status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Snack<span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="snack" id="snack">
                                    <optgroup label="Status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Dinner<span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="dinner" id="dinner">
                                    <optgroup label="Status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Ala cart <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="alaCart" id="alaCart">
                                    <optgroup label="Status">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Pincode Status <span style="color: red;">&#42</span></label>
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
                                <i class="fas fa-plus"></i> Add Pincode
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
            <h5>Pincode</h5>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="tabdata" class="table table-striped table-bordered nowrap">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <th>Area name</th>
                            <th>Pincode</th>
                            <th>Delivery Charge</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Snack</th>
                            <th>Dinner</th>
                            <th>AlaCart</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pincodes as $data )
                        <tr>
                            <td class="align-middle text-center">{{$i}}</td>
                            @php($i++)
                            <td class="align-middle text-center">{{$data->areaName}}</td>
                            <td class="align-middle text-center">{{$data->pincode}}</td>
                            <td class="align-middle text-center">{{$data->deliveryCharge}}</td>
                            <td class="align-middle text-center">
                                @if($data->breakFastFlag == 1)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                @if($data->lunchFlag == 1)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                @if($data->snackFlag == 1)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                @if($data->dinnerFlag == 1)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                @if($data->alaCartFlag == 1)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>

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
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Update Pincode</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">
                                            <form action="{{url('/pincode/updatePincode')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Name <span style="color: red;">&#42</span></label>
                                                            <input type="text" class="form-control" id="Name" name="name" value="{{$data->areaName}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Number">Pincode <span style="color: red;">&#42</span></label>
                                                            <input type="number" class="form-control" id="pincode" name="pincode" value="{{$data->pincode}}" maxlength="6" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Number">Delivery Charges <span style="color: red;">&#42</span></label>
                                                            <input type="number" class="form-control" id="deliveryCharge" name="deliveryCharge" value="{{$data->deliveryCharge}}" maxlength="6" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="" style="font-size: 17px; font-weight: 600;">Availaibility</label>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Breakfast <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="breakFast" id="breakFast">
                                                                <optgroup label="Status">
                                                                    <option value="1" {{$data->breakFastFlag == 1 ? 'selected' : ''}}>Yes</option>
                                                                    <option value="0" {{$data->breakFastFlag == 0 ? 'selected' : ''}}>No</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Lunch <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="lunch" id="lunch">
                                                                <optgroup label="Status">
                                                                    <option value="1" {{$data->lunchFlag == 1 ? 'selected' : ''}}>Yes</option>
                                                                    <option value="0" {{$data->lunchFlag == 0 ? 'selected' : ''}}>No</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Snack<span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="snack" id="snack">
                                                                <optgroup label="Status">
                                                                    <option value="1" {{$data->snackFlag == 1 ? 'selected' : ''}}>Yes</option>
                                                                    <option value="0" {{$data->snackFlag == 0 ? 'selected' : ''}}>No</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Dinner<span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="dinner" id="dinner">
                                                                <optgroup label="Status">
                                                                    <option value="1" {{$data->dinnerFlag == 1 ? 'selected' : ''}}>Yes</option>
                                                                    <option value="0" {{$data->dinnerFlag == 0 ? 'selected' : ''}}>No</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Ala cart <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="alaCart" id="alaCart">
                                                                <optgroup label="Status">
                                                                    <option value="1" {{$data->alaCartFlag == 1 ? 'selected' : ''}}>Yes</option>
                                                                    <option value="0" {{$data->alaCartFlag == 0 ? 'selected' : ''}}>No</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Pincode Status <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="status" id="status">
                                                                <optgroup label="Status">
                                                                    <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
                                                                    <option value="0" {{$data->status == 0 ? 'selected' : ''}}>InActive</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                            Update Pincode
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

                                        <form action="{{url('/pincode/deletePincode')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this Pincode? <br> ACTION CAN NOT BE REVERTED </p>
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
            url: "{{url('/pincode/status')}}",
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
            event.target.setCustomValidity('Pincode Name is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Pincode Name Too short');
        } else if (event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Only Alphabets are allowed');
        }
    })
    namee.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })
    description.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Pincode is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Pincode Too short');
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
                event.target.setCustomValidity('Pincode Name is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Pincode Name Too short');
            } else if (event.target.validity.patternMismatch) {
                event.target.setCustomValidity('Only Alphabets are allowed');
            }
        })
        enamee.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
        edescription.addEventListener('invalid', function(event) {
            if (event.target.validity.valueMissing) {
                event.target.setCustomValidity('Pincode is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Pincode Too short');
            }
        })
        edescription.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
    }
</script>
@endsection