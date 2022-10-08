@extends('layouts.admin')

@section('title', 'Update Product')

@section('header')

@endsection

@section('content')
<div class="col-sm-12 mt-3">
    <div class="card">
        <div class="card-header">
            <h5>Update Product</h5>
        </div>
        <form action="{{url('product/updateProduct')}}" method="post" enctype="multipart/form-data">
            <div class="card-body">
                @csrf
                <input type="hidden" name="hiddenId" value="{{$data->UID}}">
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
                                        <input type="text" class="form-control" id="uid" name="UID" value="{{$data->UID}}" disabled required>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Name <span style="color: red;">&#42</span></label>
                                        <input type="text" class="form-control" id="Name" name="name" value="{{$data->name}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Price <span style="color: red;">&#42</span></label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{$data->price}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Discounted Price <span style="color: red;">&#42</span></label>
                                        <input type="text" class="form-control" id="discountedPrice" name="discountedPrice" value="{{$data->discountedPrice}}" required>
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
                                        <label style="font-weight: bold;" for="role">Ala Cart Product <span style="color: red;">&#42</span></label>
                                        <select class="form-control selectpicker" name="alaCartFlag" id="alacart" required>
                                            <option value="1" {{$data->alaCartFlag == 1 ? 'selected' : ''}}>Yes</option>
                                            <option value="0" {{$data->alaCartFlag == 0 ? 'selected' : ''}}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="role">Select Category </label>
                                        <select class="form-control selectpicker" name="categoryId" id="categoryId">
                                            <optgroup label="Categories">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$category->id == $data->categoryId ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="role">Select Subcategory </label>
                                        <select class="form-control selectpicker" multiple name="subcategoryId" id="subcategoryId">
                                            <optgroup label="Sub Categories">
                                                @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" {{$subcategory->id == $data->subCategoryId ? 'selected' : ''}}>{{$subcategory->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <?php
                                $currentMealTime = explode(',', $data->mealTime);
                                ?>
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="role">Meal Time <span style="color: red;">&#42</span></label>
                                        <select class="form-control selectpicker" multiple name="mealTime[]" id="mealTime" required>
                                            <optgroup label="Meal Time">
                                                @foreach($mealTimes as $time)
                                                @if(in_array($time->UID, $currentMealTime))
                                                <option value="{{$time->UID}}" selected>{{$time->name}}</option>
                                                @else
                                                <option value="{{$time->UID}}">{{$time->name}}</option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="role">Meal Time <span style="color: red;">&#42</span></label>
                                        <select class="form-control selectpicker" name="mealTypeId" id="mealTypeId" required>
                                            <optgroup label="Meal Types">
                                                @foreach($mealTypes as $mealType)
                                                <option value="{{$mealType->id}}" {{$mealType->id == $data->mealTypeId ? 'selected' : ''}}>{{$mealType->name}}</option>
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
                                                <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Deactive</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="description">Description <span style="color: red;">&#42</span></label> <br>
                                        <textarea class="form-control" name="description" id="Description" minlength="25" required>{{$data->description}}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="tab-pane fade" id="macroContent" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Calories</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="calories" name="calories" value="{{$data->macro->calories}}">
                                        @else
                                        <input type="number" class="form-control" id="calories" name="calories" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Carbs</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="carbs" name="carbs" value="{{$data->macro->carbs}}">
                                        @else
                                        <input type="number" class="form-control" id="carbs" name="carbs" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Sugar</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="sugar" name="sugar" value="{{$data->macro->sugar}}">
                                        @else
                                        <input type="number" class="form-control" id="sugar" name="sugar" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Fat</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="fat" name="fat" value="{{$data->macro->fat}}">
                                        @else
                                        <input type="number" class="form-control" id="fat" name="fat" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Protein</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="protein" name="protein" value="{{$data->macro->protien}}">
                                        @else
                                        <input type="number" class="form-control" id="protein" name="protein" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Zinc</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="zinc" name="zinc" value="{{$data->macro->zinc}}">
                                        @else
                                        <input type="number" class="form-control" id="zinc" name="zinc" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Iro</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="iron" name="iron" value="{{$data->macro->iron}}">
                                        @else
                                        <input type="number" class="form-control" id="iron" name="iron" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Magnesium</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="mag" name="mag" value="{{$data->macro->mag}}">
                                        @else
                                        <input type="number" class="form-control" id="mag" name="mag" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Sodium</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="sodium" name="sodium" value="{{$data->macro->sodium}}">
                                        @else
                                        <input type="number" class="form-control" id="sodium" name="sodium" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Copper</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="copper" name="copper" value="{{$data->macro->copper}}">
                                        @else
                                        <input type="number" class="form-control" id="copper" name="copper" value="0">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label style="font-weight: bold;" for="Name">Potassium</label>
                                        @if(isset($data->macro))
                                        <input type="number" class="form-control" id="potassium" name="potassium" value="{{$data->macro->potasium}}">
                                        @else
                                        <input type="number" class="form-control" id="potassium" name="potassium" value="0">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="RecipeContent" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="text-right mb-5">
                                <a class="btn btn-success" data-toggle="modal" data-target="#addModal">Add Recipe</a>
                            </div>

                            <div class="dt-responsive table-responsive">
                                <table id="recipeTable" class="table ">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Sr No</th>
                                            <th>Raw Material Name</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data->recipe as $recipe)
                                        <tr id="row{{$recipe->id}}">
                                            <input type="hidden" name="" id="rowId{{$recipe->id}}" value="{{$recipe->id}}">
                                            <td class="align-middle text-center">{{$loop->iteration}}</td>
                                            <td class="align-middle text-center">
                                                @if(isset($recipe->rawMaterial))
                                                {{$recipe->rawMaterial->name}}
                                                @else
                                                <span class="text-danger">Raw Material NotFound</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">{{$recipe->quantity}}</td>
                                            <td class="align-middle text-center">{{$recipe->unit}}</td>
                                            <td class="align-middle text-center">
                                                <a onclick="getId({{$recipe->id}})" data-toggle="modal" data-target="#updateModal{{$recipe->id}}" class="btn btn-warning ">Update</a>
                                                <a onclick="deleteRecipe({{$recipe->id}})" id="delete{{$recipe->id}}" class="btn btn-danger ">Delete</a>
                                            </td>

                                            <!-- update modal -->
                                            <div class="modal fade" id="updateModal{{$recipe->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Recipe</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="Name">Raw Material Name</label>
                                                                <select class="form-control selectpicker" data-live-search="true" id="rawMaterialName{{$recipe->id}}" name="rawMaterialName">
                                                                    @foreach($rawMaterials as $raw)
                                                                    <option value="{{$raw->UID}} {{$raw->UID == $recipe->rawMaterialUId}}">{{$raw->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Name">Quantity</label>
                                                                <input type="number" class="form-control" id="quantity{{$recipe->id}}" name="quantity" value="{{$recipe->quantity}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Name">Unit</label>
                                                                <select class="form-control selectpicker" name="unit" id="unit{{$recipe->id}}">
                                                                    <optgroup label="Units">
                                                                        <option value="gms" {{$recipe->unit == 'gms' ? 'selected' : ''}}>Grams</option>
                                                                        <option value="ml" {{$recipe->unit == 'ml' ? 'selected' : ''}}>Milliliters</option>
                                                                        <option value="pcs" {{$recipe->unit == 'pcs' ? 'selected' : ''}}>Pieces</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" id="updateRecipe{{$recipe->id}}" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- add modal -->
                            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Recipe</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="productId" id="productId" value="{{$data->UID}}">
                                            <div class="form-group">
                                                <label for="Name">Raw Material Name</label>
                                                <select class="form-control selectpicker" data-live-search="true" id="rawMaterialName" name="rawMaterialName">
                                                    @foreach($rawMaterials as $raw)
                                                    <option value="{{$raw->UID}}">{{$raw->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Name">Quantity</label>
                                                <input type="number" class="form-control" id="quantity" name="quantity">
                                            </div>
                                            <div class="form-group">
                                                <label for="Name">SelectUnit</label>
                                                <select class="form-control selectpicker" name="unit" id="unit">
                                                    <optgroup label="Units">
                                                        <option value="gms">Grams</option>
                                                        <option value="ml">Milliliters</option>
                                                        <option value="pcs">Pieces</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" id="addRecipe" class="btn btn-primary">Add Recipe</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 modal-footer">
                        <button type="submit" id="updateBtn" class="btn btn-primary ">
                            <i class="far fa-edit"></i> Save Changes
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
    function deleteRecipe($id) {
        console.log('clicked');
        $.ajax({
            url: '/product/deleteRecipe/' + $id,
            type: 'GET',
            success: function(response) {
                $("#recipeTable").load(" #recipeTable > *");
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function getId($id) {
        $('#updateRecipe' + $id).click(function() {
            var rawMaterialUId = $('#rawMaterialName' + $id).val();
            var quantity = $('#quantity' + $id).val();
            var unit = $('#unit' + $id).val();
            $.ajax({
                url: '/product/updateRecipe/' + $id,
                type: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    rawMaterialUId: rawMaterialUId,
                    quantity: quantity,
                    unit: unit
                },
                success: function(response) {
                    console.log(response.status);
                    $('#updateModal' + $id).modal('hide');
                    $("#row" + $id).load(" #row" + $id + "> *");
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    }

    $('#addRecipe').click(function(e) {
        e.preventDefault();
        var productUID = $('#productId').val();
        console.log(productUID);
        var rawMaterialUId = $('#rawMaterialName').val();
        var quantity = $('#quantity').val();
        var unit = $('#unit').val();
        $.ajax({
            url: '/product/addRecipe',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                productUID: productUID,
                rawMaterialUId: rawMaterialUId,
                quantity: quantity,
                unit: unit
            },
            success: function(response) {
                console.log(response.status);
                $('#addModal').modal('hide');
                quantity.value = '';
                $("#recipeTable").load(" #recipeTable > *");

            },
            error: function(response) {
                console.log(response);
            }
        });
    });
</script>

@endsection