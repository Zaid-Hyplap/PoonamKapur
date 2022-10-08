@extends('layouts.admin')

@section('title', 'Add Package')

@section('header')

@endsection

@section('content')



<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Add Package</h5>
        </div>
        <form action="{{url('package/addPackage')}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-sm-12 text-center mb-5">
                        <div class="image-input image-input-outline" id="kt_image_4" style=" background-image: url(/media/imgBack.png)">
                            <div class="image-input-wrapper" style="width: 200px; height: 200px; background-image: url(/media/imgBack.png)"></div>

                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                <i class="fas fa-plus icon-sm text-muted"></i>
                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
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
                            <label style="font-weight: bold;" for="Name">UID <span style="color: red;">&#42</span></label>
                            <input type="text" class="form-control" onkeyup="checkUID()" id="uid" name="UID" required>
                            <label id="errorTitle"></label>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Name <span style="color: red;">&#42</span></label>
                            <input type="text" class="form-control" id="Name" name="name" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">BreakFast Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="bfPrice" name="bfPrice" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Lunch Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="lPrice" name="lPrice" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Snack Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="sPrice" name="sPrice" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="Name">Dinner Price <span style="color: red;">&#42</span></label>
                            <input type="number" class="form-control" id="dPrice" name="dPrice" required>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="role">Select Goal </label>
                            <select class="form-control selectpicker" name="goalId" id="goalId">
                                <optgroup label="Goals">
                                    @foreach($goals as $goal)
                                    <option value="{{$goal->id}}">{{$goal->name}}</option>
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
                                    <option value="{{$mealType->id}}">{{$mealType->name}}</option>
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
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label style="font-weight: bold;" for="description">Package Menu <span style="color: red;">&#42</span></label> <br>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="file" class="form-control" name="excel" id="" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <a href="{{url('storage/ExcelFiles/PackageMenu/SinglePackageMenuExcelFormat.xlsx')}}" download class="btn btn-primary">Download Format</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 modal-footer">
                    <button type="submit" disabled id="addBtn" class="btn btn-primary ">
                        <i class="fas fa-plus"></i> Add Package
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')

<script>
    function checkUID() {
        var uid = document.getElementById('uid').value;
        var errorTitle = document.getElementById('errorTitle');

        if (uid != '') {
            $.ajax({
                type: "POST",
                url: "{{url('/package/checkUID')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    uid: uid
                },
                dataType: "json",
                success: function(response) {
                    errorTitle.innerHTML = "UID already exists";
                    errorTitle.style.color = 'red';
                    document.getElementById('addBtn').disabled = true;
                    document.getElementById("uid").style.borderColor = "red";
                },
                error: function(response) {
                    errorTitle.innerHTML = "UID is available";
                    errorTitle.style.color = 'green';
                    document.getElementById('addBtn').disabled = false;
                    document.getElementById("uid").style.borderColor = "green";
                }
            });
        } else {
            errorTitle.innerHTML = "UID is required";
            errorTitle.style.color = "red";
            document.getElementById('addBtn').disabled = true;
            document.getElementById("uid").style.borderColor = "red";
        }

    }
</script>



@endsection