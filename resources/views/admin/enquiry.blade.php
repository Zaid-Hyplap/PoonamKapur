@extends('layouts.admin')

@section('title', 'Enquiry')

@section('header')

@endsection

@section('content')

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
            <h5>Enquiries</h5>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="tabdata" class="table table-striped table-bordered nowrap">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Comment</th>
                            <th>Admin Note</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquiries as $data )
                        <tr>
                            <td class="align-middle text-center">{{$i++}}</td>
                            <td class="align-middle text-center">{{$data->name}}</td>
                            <td class="align-middle text-center">{{$data->email}}</td>
                            <td class="align-middle text-center">{{$data->phone}}</td>
                            <td class="align-middle text-center" style="white-space: initial; width: 250px;">{{$data->comment}}</td>
                            <td class="align-middle text-center" style="white-space: initial; width: 250px;">{{$data->adminComment}}</td>
                            <td class="align-middle text-center">
                                <input type="checkbox" data-id="{{$data->id}}" class="toggle-class" data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{ $data->status == '1' ? 'checked' : ''}}>
                            </td>
                            <td class="table-action text-center">
                                <div>
                                    <a href="" class="btn btn-icon btn-outline-warning has-ripple" data-toggle="modal" data-target="#updateModal{{$data->id}}"><i class="fas fa-pen"></i></a>
                                    <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </td>

                            <!--Update Modal -->
                            <div class="modal fade" id="updateModal{{$data->id}}" data-backdrop="static" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Update Enquiry</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black;">
                                            <form action="{{url('/enquiry/updateEnquiry')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="role">Enquiry Status <span style="color: red;">&#42</span></label>
                                                            <select class="form-control selectpicker" name="status" id="status">
                                                                <optgroup label="Status">
                                                                    <option value="completed" {{$data->status == 'completed' ? 'selected' : ''}}>Completed</option>
                                                                    <option value="notReachable" {{$data->status == 'notReachable' ? 'selected' : ''}}>Not Reachable</option>
                                                                    <option value="pending" {{$data->status  == 'pending' ? 'selected' : ''}}>Pending</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label style="font-weight: bold;" for="description">Admin Note <span style="color: red;">&#42</span></label> <br>
                                                            <textarea class="form-control" name="comment" id="comment" value="{{$data->description}}" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 modal-footer">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-edit"></i>
                                                            Update Enquiry
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

                                        <form action="{{url('/enquiry/deleteEnquiry')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this Enquiry? <br> ACTION CAN NOT BE REVERTED </p>
                                                <div class="modal-footer">
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
            url: "{{url('/enquiry/status')}}",
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

@endsection