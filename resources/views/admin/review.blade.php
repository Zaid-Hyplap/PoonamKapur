@extends('layouts.admin')

@section('title', 'Review')

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
            <h5>Reviews</h5>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="tabdata" class="table table-striped table-bordered nowrap">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Package</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $data )
                        <tr>
                            <td class="align-middle text-center">{{$i}}</td>
                            @php($i++)
                            <td class="align-middle text-center">
                                @if(isset($data->user))
                                {{$data->user->name}}
                                @else
                                <span class="text-danger" >User Not Found</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                @if(isset($data->product))
                                {{$data->product->name}}
                                @else
                                <span class="text-danger" >Product Not Found</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                @if(isset($data->package))
                                {{$data->package->name}}
                                @else
                                <span class="text-danger" >Package Not Found</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">{{$data->rating}}</td>
                            
                            <td class="align-middle text-center" style="white-space: initial; width: 250px;">{{$data->description}}</td>
                            <td class="align-middle text-center">
                                <input type="checkbox" data-id="{{$data->id}}" class="toggle-class" data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="InActive" {{ $data->status == '1' ? 'checked' : ''}}>
                            </td>
                            <td class="table-action text-center">
                                <div>
                                    <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </td>

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

                                        <form action="{{url('/review/deleteReview')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this Review? <br> ACTION CAN NOT BE REVERTED </p>
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
            url: "{{url('/review/status')}}",
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