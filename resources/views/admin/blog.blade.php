@extends('layouts.admin')

@section('title')
Blogs
@endsection

@section('header')

@endsection

@section('content')

<div class="col-sm-12 text-right">
    <a href="{{url('/blog/addBlog')}}" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple">
        <lord-icon src="https://cdn.lordicon.com/mecwbjnp.json" trigger="hover" target="#createBtn" colors="primary:#FFFFFF,secondary:#FFFFFF" style="width:35px;height:35px">
        </lord-icon>
        Add Blog
    </a>
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

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 style="color: black;">Blogs</h5>
            </div>
            <div class="card-body">
                <div class="dt-responsive table-responsive">
                    <table class="table table-bordered table-hover table-responsive-lg" id="tabdata" style="margin-top: 13px !important">
                        <thead>
                            @php($i = 1)
                            <tr class="text-center">
                                <th>Sr.no</th>
                                <!-- <th>ID</th> -->
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Date</th>
                                <th>Creator</th>
                                <th>Writer</th>
                                <th>Discription</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $list)
                            <tr>
                                <td class="align-middle text-center">{{$i++}}</td>
                                <!-- <td class="align-middle text-center">{{$list->id}}</td> -->
                                <td class="align-middle text-center">{{$list->title}}</td>
                                <td class="align-middle text-center">{{$list->subtitle}}</td>
                                <td class="align-middle text-center">
                                    <img src="{{$list->coverImage}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Cover Image" style="height: 50px; width: 50px;">
                                </td>
                                <td class="align-middle text-center">{{$list->tags}}</td>
                                <td class="align-middle text-center">{{$list->created_at}}</td>
                                <td class="align-middle text-center">{{$list->creator}}</td>
                                <td class="align-middle text-center">{{$list->writer}}</td>
                                <td>
                                    <div class="align-middle text-center">
                                        <a class="btn btn-success has-ripple" style="color: black;" data-toggle="modal" data-target="#showDescription1{{$list->id}}"><span class="ripple ripple-animate"></span> Discription 1 </a>
                                        <br>
                                        <br>
                                        <a class="btn btn-success has-ripple" style="color: black;" data-toggle="modal" data-target="#showDescription2{{$list->id}}"><span class="ripple ripple-animate"></span> Discription 2 </a>
                                    </div>
                                </td>

                                <!--Show Discription 1 Modal -->
                                <div class="modal fade" id="showDescription1{{$list->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="min-width: 80%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Description 1</h5>
                                                <button type="button" class="close" data-dismiss="modal"> &times;</button>
                                            </div>
                                            <div class="modal-body" style=" overflow: auto; height: 500px; width: 100%">
                                                {!!$list->discription1!!}

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--Show Discription 2 Modal -->
                                <div class="modal fade" id="showDescription2{{$list->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" style="min-width: 80%">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Discription 2</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style=" overflow: auto; height: 500px; width: 100%">
                                                {!!$list->discription2!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <td class="align-middle text-center">
                                    <input type="checkbox" data-id="{{$list->id}}" class="toggle-class" data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Deactive" {{ $list->status == '1' ? 'checked' : ''}}>

                                </td>
                                <td>
                                    <div class="align-middle text-center">
                                        <a href="" class="btn btn-icon btn-outline-primary has-ripple" data-toggle="modal" data-target="#showModal{{$list->id}}"><i class="far fa-eye"></i> </a>
                                        <a href="{{url('blog/editBlog')}}/{{$list->id}}" class="btn btn-icon btn-outline-warning has-ripple"><i class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$list->id}}"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                                <!--Show Modal -->
                                <div class="modal fade" id="showModal{{$list->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Blog Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body modalSize">
                                                <form>
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label style="font-weight: bold;">Blog Id</label><br>
                                                                <label for="Title">{{$list->id}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label style="font-weight: bold;" for="Title">Title</label><br>
                                                                <label for="Title">{{$list->title}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label style="font-weight: bold;" for="Subtitle">Subtitle</label><br>
                                                                <label for="Subtitle">{{$list->subtitle}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label style="font-weight: bold;" for="Tags">Tags</label><br>
                                                                <label for="Tags">{{$list->tags}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label style="font-weight: bold;" for="Creator">Creator</label><br>
                                                                <label for="Creator">{{$list->creator}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label style="font-weight: bold;" for="Writer">Writer</label><br>
                                                                <label for="Writer">{{$list->writer}}</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <div class="form-group">
                                                                <label style="font-weight: bold;" for="role">Blog Status</label><br>
                                                                <label for="role">{{$list->status}}</label>
                                                            </div>
                                                        </div>
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

                                            <form action="blog/deleteBlog" method="post">
                                                <input type="hidden" name="hiddenId" value="{{$list->id}}">
                                                @csrf
                                                <div class="modal-body">
                                                    <p style="color: black;"> Are you sure you want to delete this blog? <br> ACTION CAN NOT BE REVERTED </p>
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
</div>

@endsection

@section('scripts')
<script>
    $('.toggle-class').on('change', function() {
        var status = $(this).prop('checked') == true ? '1' : '0';
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            url: "/blog/status",
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