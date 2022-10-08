@extends('layouts.admin')

@section('title', 'Testimonials')

@section('header')

@endsection

@section('content')

<!-- Adding Testimonial modal -->

<div class=" col-sm-12 text-right">
    <button type="button" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple" data-toggle="modal" data-target="#addModal">
    <i class="fas fa-plus"></i>
        Create Testimonial
    </button>
</div>

<div class="modal fade" id="addModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Create Testimonial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fas fa-times" style="font-size: 25px; "></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('testimonial/addTestimonial')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-sm-12 text-center mb-5">
                            <div class="image-input image-input-outline" id="kt_image_4" style=" background-image: url(/media/imgBack.png)">
                                <div class="image-input-wrapper" style="width: 200px; height: 200px; background-image: url(/media/imgBack.png)"></div>

                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                    <i class="fas fa-plus icon-sm text-muted"></i>
                                    <input type="file" name="media" />
                                    <input type="hidden" name="profile_avatar_remove" />
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Image">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Image">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Select Type <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="type" id="Type">
                                    <optgroup label="Types">
                                        <option value="image" selected>Image</option>
                                        <option value="video">Video</option>
                                    </optgroup>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="Name">Title <span style="color: red;">&#42</span></label>
                                <input type="text" class="form-control" id="Name" name="name"  pattern="[A-Za-z\s]+" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="role">Testimonial Status <span style="color: red;">&#42</span></label>
                                <select class="form-control selectpicker" name="status" id="status">
                                    <optgroup label="Status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label style="font-weight: bold;" for="discription">Testimonial <span style="color: red;">&#42</span></label> <br>
                                <textarea class="form-control" name="description" id="Description" minlength="25" required></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12 modal-footer">
                            <button type="submit" id="addBtn" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Add Testimonial
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
            <h5>Testimonials</h5>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="tabdata" class="table table-striped table-bordered nowrap">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <!-- <th>ID</th> -->
                            <th>Media</th>
                            <th>Media Type</th>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $data )
                        <tr>
                            <td class="align-middle text-center">{{$i}}</td>
                            @php($i++)
                            <!-- <td class="align-middle text-center">{{$data->id}}</td> -->
                            <td class="align-middle text-center">
                                <a data-toggle="modal" data-target="#displayMedia{{$data->id}}"> 
                                    <img src="{{$data->media != null ? $data->media : '\media\imageNotAdded.jpg'}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Tesimonial Image" style="height: 50px; width: 50px;">
                                </a>
                            </td>
                            <td class="align-middle text-center">{{$data->type}}</td>
                            <td class="align-middle text-center">{{$data->name}}</td>
                            <td class="align-middle text-center" style="white-space: initial; width: 250px;">{{$data->comment}}</td>
                            <td class="align-middle text-center">
                                <input type="checkbox" data-id="{{$data->id}}" class="toggle-class" data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Deactive" {{ $data->status == '1' ? 'checked' : ''}}>
                            </td>
                            <td class="table-action text-center">
                                <div>
                                    <!-- <a href="" class="btn btn-icon btn-outline-primary has-ripple" data-toggle="modal" data-target="#showModal{{$data->id}}"><i class="far fa-eye"></i><span class="ripple ripple-animate" style="height: 45px; width: 45px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: 7.39999px; left: -12.6px;"></span></a> -->
                                    <a href="" class="btn btn-icon btn-outline-success has-ripple" data-toggle="modal" data-target="#editModal{{$data->id}}"><i class="fas fa-pen"></i></span></a>
                                    <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></span></a>

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
                                            @if($data->media == 'image')
                                            <img src="{{$data->media != null ? $data->media : '\media\imageNotAdded.jpg'}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Tesimonial Image" style="height: 200px; width: 200px;">
                                            @elseif($data->media == 'video')
                                            <video src="{{$data->media != null ? $data->media : '\media\imageNotAdded.jpg'}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Tesimonial Image" style="height: 200px; width: 200px;" controls></video>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Show Modal -->
                            <div class="modal fade" id="showModal{{$data->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Testimonial Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">
                                            <form>
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-12 text-center">
                                                        <div class="form-group">
                                                            <img src="{{$data->media}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Testimonial Image" style="height: 150px; width: 150px;">

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group center-align">
                                                            <label style="font-weight: bold;" for="Title">Media Type </label> <br>
                                                            <label for="Title">{{$data->type}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Name </label> <br>
                                                            <label for="Name">{{$data->name}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Testimonial Status </label><br>
                                                            <label for="">{{$data->status}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="discription">Description </label> <br>
                                                            <label>{{$data->comment}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Edit Modal -->
                            <div class="modal fade" id="editModal{{$data->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Edit Testimonial</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">

                                            <form action="{{url('/testimonial/updateTestimonial')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group text-center">
                                                            <img src="{{$data->media != null ? $data->media : '\media\blank.png'}}" onerror="this.src='media/imageNotAdded.jpg'" id="image_preview{{$data->id}}" style="width: 150px;height: 150px;"><br><br>
                                                            <a id="openGallery{{$data->id}}" onclick="getId({{$data->id}})" class="btn btn-primary" style="color: white; border-radius: 5px;">Change Image</a>
                                                            <input hidden type="file" class="form-control" onclick="getId({{$data->id}})" id="EImage{{$data->id}}" name="media">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Select Media Type <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="types" id="Type">
                                                               
                                                                <optgroup label="Types">
                                                                    <option value="image" {{$data->type == 'image' ? 'selected' : ''}}>Image</option>
                                                                    <option value="video" {{$data->type == 'video' ? 'selected' : ''}}>Video</option>
                                                                </optgroup>


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="Name">Title <span style="color: red;">&#42</span></label>
                                                            <input type="text" class="form-control" value="{{$data->name}}" onchange="getId({{$data->id}})" id="EName{{$data->id}}" name="name"   required>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Testimonial Status <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="status" id="status">
                                                                <optgroup label="Status">
                                                                    <option value="1"{{$data->status == 1 ? 'selected' : ''}}>Active</option>
                                                                    <option value="0"{{$data->status == 0 ? 'selected' : ''}}>Deactive</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="discription">Testimonial <span style="color: red;">&#42</span></label> <br>
                                                            <textarea class="form-control" name="description" onchange="getId({{$data->id}})" id="EDiscription{{$data->id}}" minlength="25">{{$data->comment}}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                            Update Testimonial
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

                                        <form action="{{url('/testimonial/deleteTestimonial')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this testimonial? <br> ACTION CAN NOT BE REVERTED </p>
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
            url: "/testimonial/status",
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
    var discription = document.getElementById("Discription");
    $(document).ready(function(e) {
        $('#image_prev').click(function() {
            $('#Image').trigger('click');
        });
        $('#Image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_prev').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
    namee.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Testimonial Name is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Testimonial Name Too short');
        } else if (event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Only Alphabets are allowed');
        }
    })
    namee.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })
    discription.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Testimonial is required');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Testimonial Too short');
        }
    })
    discription.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })
</script>

<script>
    function getId(id) {
        var enamee = document.getElementById("EName" + id);
        var ediscription = document.getElementById("EDiscription" + id);
        $(document).ready(function(e) {
            $('#openGallery' + id).click(function() {
                $('#EImage' + id).trigger('click');
            });
            $('#EImage' + id).change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview' + id).attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        enamee.addEventListener('invalid', function(event) {
            if (event.target.validity.valueMissing) {
                event.target.setCustomValidity('Testimonial Name is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Testimonial Name Too short');
            } else if (event.target.validity.patternMismatch) {
                event.target.setCustomValidity('Only Alphabets are allowed');
            }
        })
        enamee.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
        ediscription.addEventListener('invalid', function(event) {
            if (event.target.validity.valueMissing) {
                event.target.setCustomValidity('Testimonial is required');
            } else if (event.target.validity.tooShort) {
                event.target.setCustomValidity('Testimonial Too short');
            }
        })
        ediscription.addEventListener('change', function(event) {
            event.target.setCustomValidity('');
        })
    }
</script>

@endsection