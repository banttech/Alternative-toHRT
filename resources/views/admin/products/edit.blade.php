@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">{{$pagetitle}}</h5>

                    </div>

                    <div class="card-body">
                        <form action="{{route('product.update',$products->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="productname">Product Name*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="productname" value="{{$products->productname}}" id="foo" placeholder="" required>
                                </div>
                                @error('productname')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="category">Product Slug*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="slug" id="bar" value="{{$products->slug}}" placeholder="" required>
                                </div>
                                @error('slug')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                                <div class="col-sm-10">
                                    <select id="largeSelect" class="form-select form-select-lg" name="category_id">
                                        @foreach($categorys as $key => $category)
                                        <option value="{{$category->id}}" {{ $category->id == $products->product_category_id ? 'selected' : ''}}>
                                            {{$category->categoryname}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Brand</label>
                                <div class="col-sm-10">
                                    <select id="largeSelect" class="form-select form-select-lg" name="brand_id">
                                        @foreach($brands as $key => $brand)
                                        <option value="{{$brand->id}}" {{ $brand->id == $products->brand_id ? 'selected' : ''}}>
                                            {{$brand->brandname}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Status</label>
                                <div class="col-sm-10">
                                    <select id="largeSelect" class="form-select form-select-lg" name="status">
                                        <option value="{{$products->status}}">{{$products->status}}</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="weight">Product Weight*<br>(in GM)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="weight" id="weight" value="{{$products->weight}}" placeholder="" required>
                                </div>
                                @error('weight')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="reg_sel_price">Regular price (£)*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="reg_sel_price" id="reg_sel_price" value="{{$products->reg_sel_price}}" min="1" placeholder="" required>
                                </div>
                                @error('reg_sel_price')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="price">Sale price (£)*</label>
                                <div class="col-sm-10">
                                    <!-- <input type="text" class="form-control" name="price" id="bar" value="{{$products->price}}" min="1"
                    placeholder="" required> -->
                                    <input type="text" class="form-control" name="price" id="price" value="{{$products->price}}" pattern="^\d+(\.\d{1,2})?$" step="0.01" min="0.01" placeholder="" required>
                                </div>

                                @error('price')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            @php
                            $dimensions = explode(",",$products->dimensions);
                            @endphp
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="dimensions">Dimensions*<br>(in cm)</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="height" id="height" value="{{$dimensions[0]}}" placeholder="Enter product height" required>
                                    {{-- <p class="allowed_type text-danger small">IN CM</p> --}}
                                </div>
                                @error('height')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="width" id="width" value="{{$dimensions[1]}}" placeholder="Enter product width" required>
                                </div>
                                @error('width')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="length" id="length" value="{{$dimensions[2]}}" placeholder="Enter product length" required>
                                </div>
                                @error('lenght')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="stockunit">Stock Unit*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="stockunit" id="stockunit" min="1" value="{{$products->stockunit}}" placeholder="" required>
                                </div>
                                @error('stockunit')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label " for="basic-default-name">Featured Image*<br>(800 x 800 pixel)</label>
                                <div class="col-sm-10">
                                    <img class="mt-2 pro_img" src="{{ url('admin_assets/images/'. $products->image)}}" alt=" " width="200px" height="200px" id="img" /> <br><br>
                                    <input type="file" name="image" class="form-control pro_img_fld_main" accept="image/*" />
                                    <p class="allowed_type text-danger small">Only JPG, JPEG and PNG extensions are allowed.Image size can't exceeds the size 800px X 800px.</p>
                                </div>
                                @error('image')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label " for="basic-default-name">Multiple Images<br>(800 x 800 pixel)</label>
                                <div class="col-sm-10" style="border: 1px solid #56C223; padding: 20px;">
                                    @php
                                    $multipleImage = explode(",",$products->multiple_images);
                                    $imageId = 1;
                                    @endphp
                                    @if($multipleImage && count($multipleImage) > 0 && $multipleImage[0] != "")
                                    @foreach($multipleImage as $key => $image)
                                    <div id="multiple_image{{$imageId}}">

                                        <div class="row">
                                            <div class="col-md-6 rmvimg_pos">
                                                <img class="mt-2 pro_img" src="{{ url('admin_assets/images/'. $image)}}" alt=" " width="100px" height="100px" id="multiple_image_{{$imageId}}" />
                                                <div class="rmv_img"><a href="javascript:void(0);" class="remove_button" title="remove field" onclick="removeImage({{$imageId}})">X</a></div>
                                            </div>
                                            <!--<div class="col-md-6"><a href="javascript:void(0);" class="remove_button" title="remove field" onclick="removeImage({{$imageId}})">Remove</a></div>-->
                                        </div>
                                        <input type="file" name="multiple_image[]" class="form-control pro_img_fld" value="{{$image}}" accept="image/*" onchange="readURL(this,{{$imageId}})" />
                                        <p class="allowed_type text-danger small" id="error_message{{$imageId}}">Only JPG, JPEG, PNG and WEBP extensions are allowed.Image size can't exceeds the size 800px X 800px.</p><br>
                                        <input type="hidden" name="multiple_image[]" value="{{$image}}" />

                                    </div>

                                    @php
                                    $imageId++;
                                    @endphp
                                    @endforeach
                                    @endif
                                    <div class="field_wrapper">

                                        <div class="image_area">

                                        </div>
                                        <br>
                                        <a href="javascript:void(0);" class="add_button" title="Add field">Add More</a>
                                    </div>

                                </div>
                                @error('multiple_image')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="description">Description*</label>
                                <div class="col-sm-10">
                                    <textarea id="description" class="form-control" name="description" required>{{$products->description}}</textarea>
                                </div>
                                @error('description')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="seotitle">Seo Title*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="seotitle" id="bar" value="{{$products->seotitle}}" placeholder="" required>
                                </div>
                                @error('seotitle')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tags">Tags*</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tags" id="bar" value="{{$products->tags}}" placeholder="" required>
                                </div>
                                @error('tags')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="metadescription">Meta Description*</label>
                                <div class="col-sm-10">
                                    <textarea id="description" class="form-control" name="metadescription" required>{{$products->metadescription}}</textarea>
                                </div>
                                @error('metadescription')
                                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary" id="add_more_btn">Update</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <style>
                .disabled-link {
                  pointer-events: none;
                  /* Prevents the link from being clickable */
                  opacity: 0.6;
                  /* Apply a visual indicator for a disabled state */
                }
              </style>

            <script>
                var priceInput = document.getElementById('reg_sel_price');

                priceInput.addEventListener('input', function(event) {
                    // Remove non-numeric and excessive decimal places
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    var parts = this.value.split('.');
                    if (parts.length > 1) {
                        parts[1] = parts[1].slice(0, 2);
                        this.value = parts.join('.');
                    }
                });

                //for stock unit

                var regSelPriceInput = document.getElementById('stockunit');
                regSelPriceInput.addEventListener('input', function(event) {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
                // for product weight


                var productWeight = document.getElementById('weight');

                productWeight.addEventListener('input', function(event) {
                    // Remove non-numeric and excessive decimal places
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    var parts = this.value.split('.');
                    if (parts.length > 1) {
                        parts[1] = parts[1].slice(0, 3);
                        this.value = parts.join('.');
                    }
                });

                // for product dimensions

                // for product height
                var productHeight = document.getElementById('height');

                productHeight.addEventListener('input', function(event) {
                    // Remove non-numeric and excessive decimal places
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    var parts = this.value.split('.');
                    if (parts.length > 1) {
                        parts[1] = parts[1].slice(0, 2);
                        this.value = parts.join('.');
                    }
                });

                // for product width
                var productWidth = document.getElementById('width');

                productWidth.addEventListener('input', function(event) {
                    // Remove non-numeric and excessive decimal places
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    var parts = this.value.split('.');
                    if (parts.length > 1) {
                        parts[1] = parts[1].slice(0, 2);
                        this.value = parts.join('.');
                    }
                });

                // for product length
                var productLength = document.getElementById('length');

                productLength.addEventListener('input', function(event) {
                    // Remove non-numeric and excessive decimal places
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    var parts = this.value.split('.');
                    if (parts.length > 1) {
                        parts[1] = parts[1].slice(0, 2);
                        this.value = parts.join('.');
                    }
                });


                var priceInput = document.getElementById('price');

                priceInput.addEventListener('input', function(event) {
                    // Remove non-numeric and excessive decimal places
                    this.value = this.value.replace(/[^0-9.]/g, '');
                    var parts = this.value.split('.');
                    if (parts.length > 1) {
                        parts[1] = parts[1].slice(0, 2);
                        this.value = parts.join('.');
                    }
                });

            </script>


            <script>
                //  const logoImg = document.getElementById('slider_img');
                //  const logoInput = document.querySelector('input[name="image"]');
                //  logoInput.addEventListener('change', function() {
                //      const file = this.files[0];
                //      if (file) {
                //          const reader = new FileReader();
                //          reader.addEventListener('load', function() {
                //              logoImg.setAttribute('src', this.result);
                //          });
                //          reader.readAsDataURL(file);
                //      }
                //  });

            </script>
            <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('description');


                CKEDITOR.replace('metadescription');


                //     const logoImg = document.getElementById('img');
                // const logoInput = document.querySelector('input[name="image"]');
                // logoInput.addEventListener('change', function() {
                //     const file = this.files[0];
                //     if (file) {
                //         const reader = new FileReader();
                //         reader.addEventListener('load', function() {
                //             logoImg.setAttribute('src', this.result);
                //         });
                //         reader.readAsDataURL(file);
                //     }
                // });

            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    var maxField = 10; //Input fields increment limitation
                    var addButton = $('.add_button'); //Add button selector
                    var wrapper = $('.image_area'); //Input field wrapper

                    var x = "{{$imageId}}"; //Initial field counter is 1

                    //Once add button is clicked
                    $(addButton).click(function() {
                        if (x < maxField) {
                            x++; //Increment field counter
                            // var fieldHTML = '<div> <input type="file" name="multiple_image[]" class="form-control" required onchange="readURL(this,'+x+')"/><div class="preview'+x+'" style="display: none;"><img id="multiple_image'+x+'" src="#" alt="your image" class="mt-2 mb-2" height="150" width="150"/><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a></div></div>'; //New input field html
                            var fieldHTML = '<div class="child_image_area' + x + '"><div class="preview' + x + '" style="display: none;">'
                            fieldHTML += '<div class="row"><div class="col-md-6 rmvimg_pos"><img id="multiple_image_' + x + '" src="#" alt="your image" class="mt-2 mb-2 pro_img" height="150" width="150"/><div class="rmv_img"><a href="javascript:void(0);" class="remove_button" onclick="removeImageArea(' + x + ')" title="Remove field">X</a></div></div></div>';
                            fieldHTML += '</div>';
                            fieldHTML += '<br><input type="file" name="multiple_image[]" class="form-control" id="files" accept="image/*" multiple required onchange="readURL(this,' + x + ')"/><p class="allowed_type text-danger small error_message_class" id="error_message' + x + '">Only JPG, JPEG, PNG and WEBP extensions are allowed.Image size cant exceeds the size 800px X 800px.</p></div>';

                            $(wrapper).append(fieldHTML); //Add field html
                        }
                    });

                    //Once remove button is clicked
                    $(wrapper).on('click', '.remove_button', function(e) {
                        e.preventDefault();
                        $(this).parent('div').remove(); //Remove field html
                        x--; //Decrement field counter
                    });
                });

                function removeImageArea(x) {
                    $('.child_image_area' + x).remove();
                }

                function removeImage(id) {
                    $('#multiple_image' + id).remove();
                }

            </script>
            <script>
                // const logoImg = document.getElementById('img');
                // const logoInput = document.querySelector('input[name="multiple_image[]"]');
                // logoInput.addEventListener('change', function() {
                //     const file = this.files[0];
                //     if (file) {
                //         const reader = new FileReader();
                //         reader.addEventListener('load', function() {
                //             logoImg.setAttribute('src', this.result);
                //         });
                //         reader.readAsDataURL(file);
                //     }
                // });
                function readURL(input, id) {

                    var allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
                    var maxFileSize = 800 * 800; // 800 KB
                    var errorMessage = document.getElementById('error_message' + id);

                    if (input.files && input.files[0]) {
                        // var reader = new FileReader();
                        // reader.onload = function(e) {
                        //   $('.preview'+id).css('display','block');
                        //   $('#multiple_image_'+id).attr('src', e.target.result);
                        // }
                        // reader.readAsDataURL(input.files[0]);

                        var file = input.files[0];
                        var extension = file.name.split('.').pop().toLowerCase();

                        if (allowedExtensions.indexOf(extension) === -1) {

                            document.getElementById('error_message' + id).innerHTML = 'Only JPG, JPEG, PNG, and WEBP extensions are allowed.';
                            var buttonClass = document.getElementById('add_more_btn').className;
                            document.getElementById('add_more_btn').className = buttonClass + ' disabled-link';
                            errorMessage.style.display = 'block';

                        } else if (file.size > maxFileSize) {

                            document.getElementById('error_message' + id).innerHTML = 'Image size cannot exceed 800px X 800px.';
                            errorMessage.style.display = 'block';
                            $('.preview' + id).css('display', 'none');

                        } else {
                            $('.error_message_class').css('display', 'none');
                            var buttonClass = document.getElementById('add_more_btn').className;
                            document.getElementById('add_more_btn').className = buttonClass.replace('disabled-link', '');
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $('.preview' + id).css('display', 'block');
                                $('#multiple_image_' + id).attr('src', e.target.result);
                            }
                            reader.readAsDataURL(file);
                        }
                    }
                }

            </script>


            @endsection
