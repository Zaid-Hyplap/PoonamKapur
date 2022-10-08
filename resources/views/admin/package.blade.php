@extends('layouts.admin')

@section('title', 'Package')

@section('header')

@endsection

@section('content')

<!-- Adding Package modal -->

<div class=" col-sm-12 text-right">
    <a href="{{url('/package/indexAddPackage')}}" id="createBtn" class="btn btn-primary btn-lg m-4 has-ripple">
        <i class="fas fa-plus"></i>
        Create Package
    </a>

    <!--Excel Modal-->
    <div class="modal fade" id="importModal" data-backdrop="static" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times" style="font-size: 20px;"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/package/importPackage')}}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="col-sm-12 text-left">
                                <div class="form-group">
                                    <label style="font-weight: bold; font-size: large;">Import Package details using Excel</label>
                                </div>
                            </div>
                            <div class="col-sm-3 text-left">
                                <div class="form-group">
                                    <label class="p-3" style="font-weight: bold;">Select Excel File <span style="color: red;">&#42</span></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="excel" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <a href="{{url('storage/ExcelFiles/Package/PackageExcelFormat.xlsx')}}" id="download" download class="btn btn-success"><i class="fas fa-cloud-download-alt"></i>or Download format
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{url('/package/importMultiplePackageMenu')}}" method="post">
                        <div class="row">
                            @csrf
                            <div class="col-sm-12 text-left">
                                <div class="form-group">
                                    <label style="font-weight: bold; font-size: large;">Import Package Menu in bulk using excel</label>
                                </div>
                            </div>
                            <div class="col-sm-3 text-left">
                                <div class="form-group">
                                    <label class="p-3" style="font-weight: bold;">Select Excel File <span style="color: red;">&#42</span></label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="excel" required>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <a href="{{url('storage/ExcelFiles/Package/MultiPackageMenuExcelFormat.xlsx')}}" id="download" download class="btn btn-success"><i class="fas fa-cloud-download-alt"></i>or Download format
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

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
    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h4>Package List</h4>
            </div>
            <div class="card-toolbar">
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" id="export" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-file-excel"></i>Export</button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
                            <!-- <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-print"></i>
                                    </span>
                                    <span class="navi-text">Print</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-copy"></i>
                                    </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li> -->
                            <li class="navi-item">
                                <a href="{{url('/package/exportToExcel')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a>
                            </li>
                            <!-- <li class="navi-item">
                                <a href="{{url('/package/packageMenu/exportToCSV')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a>
                            </li> -->
                            <!-- <li class="navi-item">
                                <a href="{{url('/user/exportToPDF')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>

                <button type="button" id="addExcel" class="btn btn-primary has-ripple" data-toggle="modal" data-target="#importModal"><i class="fas fa-file-import"></i>Import Excel</button>
            </div>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="tabdata" class="table table-striped table-bordered nowrap">
                    <thead>
                        @php($i = 1)
                        <tr class="text-center">
                            <th>Sr.no</th>
                            <th>UID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Goal</th>
                            <th>Meal Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $data )
                        <tr>
                            <td class="align-middle text-center">{{$i++}}</td>
                            <td class="align-middle text-center">{{$data->UID}}</td>
                            <td class="align-middle text-center">
                                <a data-toggle="modal" data-target="#displayMedia{{$data->id}}">
                                    <img src="{{$data->image != null ? $data->image : '\media\imageNotAdded.jpg'}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Tesimonial Image" style="height: 50px; width: 50px;">
                                </a>
                            </td>
                            <td class="align-middle text-center">{{$data->name}} <br> <a href="{{url('/package/packageMenu')}}/{{$data->UID}}">View Menu</a> </td>
                            <td class="align-middle text-center" style="white-space: initial; width: 70px;">

                                <span class="badge badge-primary" style="margin-top: 5px;">Break Fast : {{$data->bfPrice}}</span>
                                <span class="badge badge-primary" style="margin-top: 5px;">Lunch : {{$data->lPrice}}</span>
                                <span class="badge badge-primary" style="margin-top: 5px;">Snack : {{$data->sPrice}}</span>
                                <span class="badge badge-primary" style="margin-top: 5px;">Dinner : {{$data->dPrice}}</span>

                            </td>
                            <td class="align-middle text-center">
                                @if(isset($data->goal))
                                {{$data->goal->name}}
                                @else
                                <span class="text-danger">Goal Not Found</span>
                                @endif
                            </td>
                            <td class="align-middle text-center">
                                @if(isset($data->mealtype))
                                {{$data->mealtype->name}}
                                @else
                                <span class="text-danger">Meal Type Not Found</span>
                                @endif
                            </td>
                            </td>
                            <td class="align-middle text-center" style="white-space: initial; width: 250px;">{{$data->description}}</td>
                            <td class="align-middle text-center">
                                <input type="checkbox" data-id="{{$data->id}}" class="toggle-class" data-style="slow" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Active" data-off="Deactive" {{ $data->status == '1' ? 'checked' : ''}}>
                            </td>
                            <td class="table-action text-center">
                                <div>
                                    <!-- <a href="{{url('/package/PackageRecipe')}}/{{$data->UID}}" class="btn btn-icon btn-outline-primary has-ripple" ><i class="fas fa-utensils"></i></a> -->
                                    <a href="{{url('/package/indexUpdatePackage')}}/{{$data->UID}}" class="btn btn-icon btn-outline-warning has-ripple"><i class="fas fa-pen"></i></a>
                                    <a href="#" class="btn btn-icon btn-outline-danger has-ripple" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="far fa-trash-alt"></i></a>

                                </div>
                            </td>

                            <!--Image Modal -->
                            <div class="modal fade" id="displayMedia{{$data->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" style="font-weight: 600; color: black; font-size: large;">Media</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times" style="font-size: 25px; "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="{{$data->image != null ? $data->image : '\media\imageNotAdded.jpg'}}" onerror="this.src='media/imageNotAdded.jpg'" alt="Tesimonial Image" style="height: 400px; width: 600px;">
                                            </div>
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

                                        <form action="{{url('/package/deletePackage')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="hiddenId" value="{{$data->id}}">
                                            <div class="modal-body">
                                                <p style="color: black;"> Are you sure you want to delete this Package? <br> ACTION CAN NOT BE REVERTED </p>
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
            url: "/package/status",
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