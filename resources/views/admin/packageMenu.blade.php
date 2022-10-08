@extends('layouts.admin')

@section('title', 'Package Menu')

@section('header')

@endsection

@section('content')
<!--Excel Modal-->
<div class="modal fade" id="importModal" data-backdrop="static" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import User Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fas fa-times" style="font-size: 20px;"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{url('/package/addPackageMenuExcel')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="packageUId" value="{{$packageData->UID}}">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="p-3" style="font-weight: bold;">Select Excel File <span style="color: red;">&#42</span></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="file" class="form-control" name="excel" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="p-3" style="font-weight: bold;">
                                    Download Format
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <a href="{{url('storage/ExcelFiles/PackageMenu/SinglePackageMenuExcelFormat.xlsx')}}" id="download" download class="btn btn-success"><i class="fas fa-cloud-download-alt"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer m-0 p-0 pt-3">
                        <!-- <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button> -->
                        <button type="submit" id="addExcel" class="btn btn-primary font-weight-bold">
                            <i class="fas fa-plus"></i>
                            Add Excel
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<div class="col-sm-12 mt-3">
    <div class="card card-custom">
        <div class="card-header flex-wrap">
            <div class="card-title">
                <h3 class="card-label">Package Menu </h3>
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
                                <a href="{{url('/package/packageMenu')}}/{{$packageData->UID}}/exportToExcel" class="navi-link">
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

                <table class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr class="text-center">
                            <th>Days</th>
                            <th>BreakFast</th>
                            <th>Lunch</th>
                            <th>Snack</th>
                            <th>Dinner</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $value)
                        <tr>
                            <td class="align-middle text-center">{{$value->day}}</td>
                            <td>
                                @if(isset($value->bf))
                                <div class="d-flex">
                                    <a class="symbol symbol-50px">
                                        <img src="/{{$value->bf->image != null ? $value->bf->image : media/imageNotAdded.jpg}}" class="symbol-label" alt="">
                                    </a>
                                    <div class="m-5" style="text-align: start;">
                                        <label class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">{{$value->bf->name}}</label>
                                    </div>
                                </div>
                                @else
                                <span class="text-danger">No Product Found</span>
                                @endif
                            </td>

                            <td>
                                @if(isset($value->l))
                                <div class="d-flex">
                                    <a class="symbol symbol-50px">
                                        <img src="/{{$value->l->image != null ? $value->l->image : media/imageNotAdded.jpg}}" class="symbol-label" alt="">
                                    </a>
                                    <div class="m-5" style="text-align: start;">
                                        <label class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">{{$value->l->name}}</label>
                                    </div>
                                </div>
                                @else
                                <span class="text-danger">No Product Found</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($value->s))
                                <div class="d-flex">
                                    <a class="symbol symbol-50px">
                                        <img src="/{{$value->s->image != null ? $value->s->image : media/imageNotAdded.jpg}}" class="symbol-label" alt="">
                                    </a>
                                    <div class="m-5" style="text-align: start;">
                                        <label class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">{{$value->s->name}}</label>
                                    </div>
                                </div>
                                @else
                                <span class="text-danger">No Product Found</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($value->d))
                                <div class="d-flex">
                                    <a class="symbol symbol-50px">
                                        <img src="/{{$value->d->image != null ? $value->d->image : media/imageNotAdded.jpg}}" class="symbol-label" alt="">
                                    </a>
                                    <div class="m-5" style="text-align: start;">
                                        <label class="text-gray-800 text-hover-primary fs-5 fw-bold mb-1">{{$value->d->name}}</label>
                                    </div>
                                </div>
                                @else
                                <span class="text-danger">No Product Found</span>
                                @endif
                            </td>

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