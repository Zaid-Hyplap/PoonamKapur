@extends('layouts.admin')

@section('title')
Add Report
@endsection

@section('header')

@endsection

@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 style="color: black;">Add Blog</h5>
        </div>
        <div id="error_msg"></div>
        <div class="card-body">
            <div class="modal-body">
                <div class="col-sm-12">
                    <!--  -->
                    <form action="saveBlog" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 text-center mb-5">
                                <div class="image-input image-input-outline" id="kt_image_4" style=" background-image: url(/media/imgBack.png)">
                                    <div class="image-input-wrapper" style="width: 200px; height: 200px; background-image: url(/media/imgBack.png)"></div>

                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Image">
                                        <i class="fas fa-plus icon-sm text-muted" style="color: black;"></i>
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
                            <!-- <div class="col-sm-12">
                                <div class="form-group text-center">
                                    <img for="Image" id="image_prev" style="width: 150px;height: 150px;background-image: url(/media/imgBack.png);  background-position: center ;">
                                    <input type="file" id="Image" name="image" accept="image/*" style="width: 1px; height: 1px;" required>
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="Title">Title <span style="color: red;">&#42</span></label>
                                    <input type="text" class="form-control" id="Title" name="title" minlength="10" pattern="[A-Za-z\s]+" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="Subtitle">Subtitle <span style="color: red;">&#42</span></label>
                                    <input type="text" class="form-control" id="Subtitle" name="subtitle" minlength="10" pattern="[A-Za-z\s]+" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="Tags">Tags <span style="color: red;">&#42</span> (Seperate it with a comma)</label>
                                    <input type="text" class="form-control" id="Tags" name="tags" minlength="5" required>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="Creator">Creator <span style="color: red;">&#42</span></label>
                                    <input type="text" class="form-control" id="Creator" name="creator" minlength="3" pattern="[A-Za-z\s]+" required>
                                </div>
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="Writer">Writer <span style="color: red;">&#42</span></label>
                                    <input type="text" class="form-control" id="Writer" name="writer" minlength="3" pattern="[A-Za-z\s]+" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="role">Activity Status <span style="color: red;">&#42</span></label>
                                    <select class="form-control selectpicker" name="status" id="status">
                                        <optgroup label="Status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </optgroup>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="Description1">Add Description 1 <span style="color: red;">&#42</span></label>
                                    <textarea id="summernote1" name="desc1" ></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label style="font-weight: bold;" for="Description2">Add Description 2</label>
                                    <textarea id="summernote2" name="desc2"></textarea>
                                </div>
                            </div>

                            <div class="text-center col-sm-12">
                                <button type="submit" class="btn btn-primary">Add Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function checkImage() {
        var img = document.getElementById('Image').value;
        console.log(img);
        return false;
        if (img.length == 0) {
            console.log('image not added');
            return false;
        }
    }
</script>

<script>
    var title = document.getElementById("Title");
    var subtitle = document.getElementById("Subtitle");
    var tags = document.getElementById("Tags");
    // var creator = document.getElementById("Creator");
    var writer = document.getElementById("Writer");
    var desc1 = document.getElementById("summernote1");



    // $(document).ready(function(e) {
    //     $('#image_prev').click(function() {
    //         $('#Image').trigger('click');
    //     });


    //     $('#Image').change(function() {
    //         let reader = new FileReader();
    //         reader.onload = (e) => {
    //             $('#image_prev').attr('src', e.target.result);
    //         }
    //         reader.readAsDataURL(this.files[0]);
    //     });
    // });

    title.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Please Enter The Title');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Title Too short');
        } else if (event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Only Alphabets are allowed');
        }
    })
    title.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })

    subtitle.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Please Enter A SubTitle');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('SubTitle Too short');
        } else if (event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Only Alphabets are allowed');
        }
    })
    subtitle.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })

    tags.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Please Enter Blog Tags');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Tags Too less');
        }
    })
    tags.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })

    writer.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Please Enter Writers Name');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Writers Name Too short');
        } else if (event.target.validity.patternMismatch) {
            event.target.setCustomValidity('Only Alphabets are allowed');
        }
    })
    writer.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })

    desc1.addEventListener('invalid', function(event) {
        if (event.target.validity.valueMissing) {
            event.target.setCustomValidity('Please Enter Description');
        } else if (event.target.validity.tooShort) {
            event.target.setCustomValidity('Description Too short');
        }
    })
    desc1.addEventListener('change', function(event) {
        event.target.setCustomValidity('');
    })
</script>


@endsection