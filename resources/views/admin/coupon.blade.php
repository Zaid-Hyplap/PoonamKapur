@extends('layouts.admin')

@section('title', 'Coupons')

@section('header')

@endsection

@section('content')

<!-- Adding Coupon modal -->

<div class=" col-sm-12 text-right">
    <button type="button" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#addModal">
        <i class="fas fa-plus"></i> Add Coupon
    </button>
</div>

<div class="modal fade" id="addModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Create Coupon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" style="font-size: 25px; "></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/coupon/addCoupon')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center">

                            <div class="form-group">
                                <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url(assets/media/users/blank.png)">
                                    <div class="image-input-wrapper"></div>
                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                        <input type="file" name="image" required accept=".png, .jpg, .jpeg" style="height: 1px!important; width: 1px!important" />
                                        <input type="hidden" name="profile_avatar_remove" />
                                    </label>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Name">Name <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name"  required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Coupon Type <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="type" id="type">
                                    <optgroup label="Status">
                                        <option value="percentage">Percentage</option>
                                        <option value="rupees">Rupees</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Amount <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Start Date <span style="color: red;">&#42</span></label>
                                <input type="date" class="form-control" id="startDate" name="startDate">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">End Date <span style="color: red;">&#42</span></label>
                                <input type="date" class="form-control" id="endDate" name="endDate">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Coupon For <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="for" id="for">
                                    <optgroup label="Status">
                                        <option value="package">Package</option>
                                        <option value="cart">Ala Cart</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Coupon Status <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <optgroup label="Status">
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="description">Description <span style="color: red;">&#42</span></label> <br>
                                <textarea class="form-control" name="description" id="Description" minlength="25" required></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 modal-footer">
                            <button type="submit" id="addBtn" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Coupon
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
            <h5>Coupons</h5>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="tabdata" class="table table-striped table-bordered nowrap">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Coupon For</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $data )
                        <tr>
                            <td class="align-middle text-center">{{$i}}</td>
                            @php($i++)
                            <td class="align-middle text-center">
                                <a data-toggle="modal" data-target="#displayMedia{{$data->id}}">
                                    <img src="{{$data->image != null ? $data->image : '\media\imageNotAdded.jpg'}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Tesimonial Image" style="height: 50px; width: 50px;">
                                </a>
                            </td>
                            <td class="align-middle text-center">{{$data->name}}</td>
                            <td class="align-middle text-center">{{$data->couponType}}</td>
                            <td class="align-middle text-center">{{$data->amount}}</td>
                            <td class="align-middle text-center">{{$data->startDate}}</td>
                            <td class="align-middle text-center">{{$data->endDate}}</td>
                            <td class="align-middle text-center">{{$data->for}}</td>
                            <td class="align-middle text-center" style="white-space: initial; width: 250px;">{{$data->description}}</td>
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

                            <!--Delete Modal -->
                            <div class="modal fade" id="displayMedia{{$data->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Media</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 text-center">
                                                    <img src="{{$data->image != null ? $data->image : '\media\imageNotAdded.jpg'}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Tesimonial Image" style="height: 250px; width: 250px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Update Modal -->
                            <div class="modal fade" id="updateModal{{$data->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Update Coupon</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">
                                            <form action="{{url('/coupon/updateCoupon')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <div class="form-group">
                                                            <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url(assets/media/users/blank.png)">
                                                                <div class="image-input-wrapper" style="background-image: url({{$data->image}})"></div>
                                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                                    <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                                    <input type="hidden" name="profile_avatar_remove" />
                                                                </label>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
           
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="description">Coupon <span style="color: red;">&#42</span></label> <br>
                                                            <textarea class="form-control" name="description" id="EDescription{{$data->id}}" >{{$data->comment}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                            Update Coupon
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

                                        <form action="{{url('/coupon/deleteCoupon')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this Coupons? <br> ACTION CAN NOT BE REVERTED </p>
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
            url: "{{url('/coupon/status')}}",
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
            event.target.setCustomValidity('Coupon Name is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Coupon Name Too short');
        } else if (event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Only Alphabets are allowed');
        }
    })
    namee.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })
    description.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Coupon is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Coupon Too short');
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
                event.target.setCustomValidity('Coupon Name is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Coupon Name Too short');
            } else if (event.target.validity.patternMismatch) {
                event.target.setCustomValidity('Only Alphabets are allowed');
            }
        })
        enamee.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
        edescription.addEventListener('invalid', function(event) {
            if (event.target.validity.valueMissing) {
                event.target.setCustomValidity('Coupon is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Coupon Too short');
            }
        })
        edescription.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
    }
</script>


@endsection