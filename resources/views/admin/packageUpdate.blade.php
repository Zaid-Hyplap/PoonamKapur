@extends('layouts.admin')

@section('title', 'Update Package')

@section('header')

@endsection

@section('content')



<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Update Package</h5>
        </div>
        <form action="{{url('package/updatePackage')}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-sm-12 text-center mb-5">
                        <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url(/assets/media/users/blank.png)">
                            <div class="image-input-wrapper" style="background-image: url(/{{$data->image}})"></div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">UID <span style="color: red;">&#42</span></label>
                            <input type="text" class="form-control"  id="uid" name="UID" value="{{$data->UID}}" required>
                            <label id="errorTitle"></label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Name <span style="color: red;">&#42</span></label>
                            <input type="text" class="form-control" id="Name" name="name" value="{{$data->name}}" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">BreakFast Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="bfPrice" name="bfPrice" value="{{$data->bfPrice}}" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Lunch Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="lPrice" name="lPrice" value="{{$data->lPrice}}" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Snack Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="sPrice" name="sPrice" value="{{$data->sPrice}}" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Dinner Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="dPrice" name="dPrice" value="{{$data->dPrice}}" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="role">Select Goal </label>
                            <select class="form-control selectpicker" name="goalId" id="goalId">
                                <optgroup label="Goals">
                                    @foreach($goals as $goal)
                                    <option value="{{$goal->id}}" {{$goal->id == $data->goalId ? 'selected' : ''}}>{{$goal->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="role">Select Meal Type <span style="color: red;">&#42</span></label>
                            <select class="form-control selectpicker" name="mealTypeId" id="mealTypeId" required>
                                <optgroup label="Meal Types">
                                    @foreach($mealTypes as $mealType)
                                    <option value="{{$mealType->id}}" {{$mealType->id == $data->meayTypeId ? 'selected' : ''}}>{{$mealType->name}}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="role">Package Status <span style="color: red;">&#42</span></label>
                            <select class="form-control selectpicker" name="status" id="status">
                                <optgroup label="Status">
                                    <option value="1" {{$data->status == 1 ? 'selected' : ''}} >Active</option>
                                    <option value="0" {{$data->status == 0 ? 'selected' : ''}} >Inactive</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="description">Description <span style="color: red;">&#42</span></label> <br>
                            <textarea class="form-control" name="description" id="Description" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 modal-footer">
                    <button type="submit" id="updateBtn" class="btn btn-primary ">
                        <i class="fas fa-plus"></i> Update Package
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')


@endsection