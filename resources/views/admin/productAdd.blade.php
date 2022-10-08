@extends('layouts.admin')

@section('title', 'Add Product')

@section('header')

@endsection

@section('content')



<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Add Product</h5>
        </div>
        <form action="{{url('product/addProduct')}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <div class="example-preview">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="basicTab" data-toggle="tab" href="#basicContent">
                                <span class="nav-icon">
                                    <i class="flaticon2-chat-1"></i>
                                </span>
                                <span class="nav-text">Basic</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="macroTab" data-toggle="tab" href="#macroContent" aria-controls="profile">
                                <span class="nav-icon">
                                    <i class="flaticon2-layers-1"></i>
                                </span>
                                <span class="nav-text">Macros</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="RecipeTab" data-toggle="tab" href="#RecipeContent" aria-controls="contact">
                                <span class="nav-icon">
                                    <i class="flaticon2-rocket-1"></i>
                                </span>
                                <span class="nav-text">Recipe</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="basicContent" role="tabpanel" aria-labelledby="home-tab">
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Price <span style="color: red;">&#42</span></label>
                                        <input type="text" class="form-control" id="price" name="price" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Discounted Price <span style="color: red;">&#42</span></label>
                                        <input type="text" class="form-control" id="discountedPrice" name="discountedPrice" required>
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
                                        <label style="font-weight: bold;" for="role">Ala Cart Product <span style="color: red;">&#42</span></label>
                                        <select class="form-control selectpicker" name="alaCartFlag" id="alacart" required>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="role">Select Category </label>
                                        <select class="form-control selectpicker" data-live-search="true" data-size="5" id="categoryList" name="categoryId">
                                            <optgroup label="Categories">
                                                <option value="">Select Category</option>

                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="role">Select Subcategory </label>
                                        <select class="form-control" id="subcategoryList" data-live-search="true" data-size="5" name="subcategoryId" disabled>
                                            <optgroup label="Sub Categories">
                                                <option value="">Select Category First</option>
                                                @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" class='parent-{{ $subcategory->categoryId }} subcategory'>{{$subcategory->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="role">Meal Time <span style="color: red;">&#42</span></label>
                                        <select class="form-control selectpicker" multiple name="mealTime[]" id="mealTime" required>
                                            <optgroup label="Meal Time">
                                                @foreach($mealTimes as $mealTime)
                                                <option value="{{$mealTime->id}}">{{$mealTime->name}}</option>
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
                                        <label style="font-weight: bold;" for="role">Product Status <span style="color: red;">&#42</span></label>
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

                            </div>
                        </div>


                        <div class="tab-pane fade" id="macroContent" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Calories</label>
                                        <input type="number" class="form-control" id="calories" name="calories" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Carbs</label>
                                        <input type="number" class="form-control" id="carbs" name="carbs" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Sugar</label>
                                        <input type="number" class="form-control" id="sugar" name="sugar" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Fat</label>
                                        <input type="number" class="form-control" id="fat" name="fat" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Protein</label>
                                        <input type="number" class="form-control" id="protein" name="protein" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Zinc</label>
                                        <input type="number" class="form-control" id="zinc" name="zinc" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Iro</label>
                                        <input type="number" class="form-control" id="iron" name="iron" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Magnesium</label>
                                        <input type="number" class="form-control" id="mag" name="mag" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Sodium</label>
                                        <input type="number" class="form-control" id="sodium" name="sodium" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Copper</label>
                                        <input type="number" class="form-control" id="copper" name="copper" value="0">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Potassium</label>
                                        <input type="number" class="form-control" id="potassium" name="potassium" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="RecipeContent" role="tabpanel" aria-labelledby="contact-tab">
                            <input type="hidden" name="totalRecipe" id="totalRecipe">
                            <div class=" mb-5">
                                <a class="btn btn-success" id="addRecipe">Add Recipe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 modal-footer">
                        <button type="submit" id="addBtn" class="btn btn-primary ">
                            <i class="fas fa-plus"></i> Add Product
                        </button>
                    </div>
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
                url: "{{url('/product/checkUID')}}",
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

<script>
    var i = 0;
    $('#addRecipe').click(function(e) {
        e.preventDefault();
        ++i;
        addDiv(i);
        document.getElementById('totalRecipe').value = i;

    });

    function addDiv(id) {
        $('#RecipeContent').append('\
            <div class="row" id="row' + id + '">\
                <div class="col-sm-5">\
                    <div class="form-group">\
                        <label style="font-weight: bold;" for="Name">Raw Material</label>\
                        <select class="form-control " name="rawMaterial' + id + '" id="kt_select2_' + id + '">\
                            <optgroup label="Raw Material">\
                                @foreach($rawMaterials as $rawMaterial)\
                                <option value="{{$rawMaterial->UID}}">{{$rawMaterial->name}}</option>\
                                @endforeach\
                            </optgroup>\
                        </select>\
                    </div>\
                </div>\
                <div class="col-sm-3">\
                    <div class="form-group">\
                        <label style="font-weight: bold;" for="Name">Quantity</label>\
                        <input type="number" class="form-control" id="quantity' + id + '" name="quantity' + id + '" value="0">\
                    </div>\
                </div>\
                <div class="col-sm-3">\
                    <div class="form-group">\
                        <label style="font-weight: bold;" for="Name">Unit</label>\
                        <select class="form-control"  name="unit' + id + '" id="unit' + id + '">\
                            <optgroup label="Units">\
                                <option value="gms">Grams</option>\
                                <option value="ml">Milliliters</option>\
                                <option value="pcs">Pieces</option>\
                            </optgroup>\
                        </select>\
                    </div>\
                </div>\
                <div class="col-sm-1">\
                    <a class="btn btn-danger" id="removeDivBtn' + id + '"><i class="fas fa-trash-alt" style="font-size: 20px;"></i></a>\
                </div>\
            </div>\
            ');

        var prevId = id - 1;
        if (prevId == 0) {
            prevId = 1;
        }
        var KTSelect2 = function() {
            var demos = function() {
                $('#kt_select2_' + id).select2({});
            }
            return {
                init: function() {
                    demos();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTSelect2.init();
        });

        document.getElementById('removeDivBtn' + prevId).style.display = 'none';

        $('#removeDivBtn' + id).click(function() {
            $('#row' + id).remove();
            i--;
            if (id == 1) {
                document.getElementById('removeDivBtn' + prevId).style.display = 'block';
                document.getElementById('totalRecipe').value = i;
            } else {
                document.getElementById('removeDivBtn' + prevId).style.display = 'block';
                document.getElementById('totalRecipe').value = i;
            }
        });


    }
</script>

<script>
    $('#categoryList').on('change', function() {
        console.log(document.getElementById('subcategoryList').value);
        $("#subcategoryList").attr('disabled', false); //enable subcategory select
        $("#subcategoryList").val("");
        $(".subcategory").attr('disabled', true);
        $(".subcategory").hide(); //hide all subcategory option
        $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
        $(".parent-" + $(this).val()).show();
    });

    var KTSelect2 = function() {
        var demos = function() {
            $('#subcategoryList').select2({});
        }
        return {
            init: function() {
                demos();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTSelect2.init();
    });
</script>

@endsection