<style>
  #preview img {
    max-height: 100px;
  }
</style>

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
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="productname">Product Name*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="productname" id="foo" placeholder="" required>
                </div>
                @error('productname')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="category">Product Slug*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="slug" id="bar" placeholder="" required>
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
                    <option value="{{$category->id}}" {{ old('category')==$category->categoryname ?
                      'selected' : '' }}>
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
                    <option value="{{$brand->id}}" {{ old('brand')==$brand->brandname ?
                      'selected' : '' }}>
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
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                </div>
                @error('status')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>



              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="weight">Product Weight*<br>(in gm)</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="weight" id="weight" placeholder="" required>
                </div>
                @error('weight')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="reg_sel_price">Regular price (£)*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="reg_sel_price" id="reg_sel_price" placeholder=""
                    required>
                </div>
                @error('reg_sel_price')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="price">Sale price (£)*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="price" id="price" placeholder="" required>
                </div>
                @error('price')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="dimensions">Dimensions*<br>(in cm)</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="height" id="height" placeholder="Enter product height"
                    required>
                </div>
                @error('height')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="width" id="width" placeholder="Enter product width"
                    required>
                </div>
                @error('width')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
                <div class="col-sm-3">
                  <input type="text" class="form-control" name="length" id="length" placeholder="Enter product length"
                    required>
                </div>
                @error('lenght')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="stockunit">Stock Unit*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="stockunit" id="stockunit" placeholder="" required>
                </div>
                @error('stockunit')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label " for="basic-default-name">Featured Image*<br>(800 x 800
                  pixel)</label>
                <div class="col-sm-10">

                  <div class="preview111" style="display: none;">

                    <div class="row">
                      <div class="col-md-6 rmvimg_pos">
                        <img id="multiple_image111" src="#" alt="your image" class="mt-2 mb-2 pro_img" height="150"
                          width="150" />

                      </div>
                    </div>

                  </div>
                  <input type="file" name="image" class="form-control" required onchange="readFeaturedURL(this,111)"
                    accept="image/*" />
                  <p class="allowed_type text-danger small">Only JPG, JPEG and PNG extensions are allowed.Image size
                    can't exceeds the size 800px X 800px.</p>
                </div>
                @error('image')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label " for="basic-default-name">Multiple Images<br>(800 x 800
                  pixel)</label>
                <div class="col-sm-10 field_wrapper">

                  <div class="image_area">
                    <div class="child_image_area0">
                      <div class="preview0" style="display: none;">

                        <div class="row">
                          <div class="col-md-6 rmvimg_pos">
                            <img id="multiple_image0" src="#" alt="your image" class="mt-2 mb-2 pro_img" height="150"
                              width="150" />
                            <div class="rmv_img"><a href="javascript:void(0);" class="remove_button"
                                title="Remove field" onclick="removeImageArea(0)">X</a></div>
                          </div>
                        </div>

                      </div>

                      <input type="file" name="multiple_image[]" class="form-control pro_img_fld" id="files"
                        accept="image/*" multiple onchange="readURL(this,0)" />
                      <p class="allowed_type text-danger small error_message_class" id="error_message0">Only JPG, JPEG,
                        PNG and WEBP extensions are allowed.Image size can't exceeds the size 800px X 800px.</p><br>
                      <!-- <p class="allowed_type text-danger small" id="error_message" style="display: none;"></p> -->

                    </div>

                  </div>
                  <br>
                  <a href="javascript:void(0);" id="" class="add_button mt-2" title="Add field">Add More</a>

                  {{-- <div id="preview"></div>
                  --}}
                </div>

              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="description">Description*</label>
                <div class="col-sm-10">
                  <textarea id="description" class="form-control" name="description" required></textarea>
                </div>
                @error('description')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="seotitle">Seo Title*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="seotitle" id="bar" placeholder="" required>
                </div>
                @error('seotitle')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="tags">Tags*</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tags" id="bar" placeholder="" required>
                </div>
                @error('tags')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>


              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="metadescription">Meta Description*</label>
                <div class="col-sm-10">
                  <textarea id="description" class="form-control" name="metadescription" required></textarea>
                </div>
                @error('metadescription')
                <div class="text-danger offset-sm-2 col-sm-10">{{ $message }}</div>
                @enderror
              </div>

              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary" id="add_more_btn"> Add</button>
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
    parts[1] = parts[1].slice(0,2);
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
    parts[1] = parts[1].slice(0, 3);
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





      <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
      <script>
        CKEDITOR.replace('description');
    

      CKEDITOR.replace('metadescription');
     



      const preview = (file) => {
  const fr = new FileReader();
  fr.onload = () => {
    const img = document.createElement("img");
    img.src = fr.result;  // String Base64 
    img.alt = file.name;
    document.querySelector('#preview').append(img);
  };
  fr.readAsDataURL(file);
};

document.querySelector("#files").addEventListener("change", (ev) => {
  if (!ev.target.files) return; // Do nothing.
  [...ev.target.files].forEach(preview);
});


      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
           // var fieldHTML = '<div> <input type="file" name="multiple_image[]" class="form-control" required /> <a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
            var x = 1; //Initial field counter is 1
            
            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){ 
                    x++; //Increment field counter
                    var fieldHTML ='<div class="child_image_area'+x+'"><div class="preview'+x+'" style="display: none;">';
                    fieldHTML  += '<div class="row"><div class="col-md-6 rmvimg_pos"><img id="multiple_image'+x+'" src="#" alt="your image" class="mt-2 mb-2 pro_img" height="150" width="150"/><div class="rmv_img"><a href="javascript:void(0);" class="remove_button" onclick="removeImageArea('+x+')" title="Remove field">X</a></div></div></div>';
                    fieldHTML  += '</div>';
                    fieldHTML  += '<br><input type="file" name="multiple_image[]" class="form-control" id="files" accept="image/*" multiple required onchange="readURL(this,'+x+')"/><p class="allowed_type text-danger small error_message_class" id="error_message'+x+'">Only JPG, JPEG, PNG and WEBP extensions are allowed.Image size cant exceeds the size 800px X 800px.</p></div>';
                    // var fieldHTML = '<div class="preview'+x+'" style="display: none;"><img id="multiple_image'+x+'" src="#" alt="your image" class="mt-2 mb-2" height="150" width="150"/><a href="javascript:void(0);" class="remove_button" title="Remove field">Remove</a><input type="file" name="multiple_image[]" class="form-control" required onchange="readURL(this,'+x+')"/></div>'; //New input field html
                    $('.image_area').append(fieldHTML); //Add field html
                }
            });
            
            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
        function removeImageArea(x){
          $('.child_image_area'+x).remove();
        }
        function readFeaturedURL(input,id) {
          
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('.preview'+id).css('display','block');
              $('#multiple_image'+id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }



  function readURL(input, id) {
    var allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
    var maxFileSize = 800 * 800; // 800 KB
    // var errorMessage = document.getElementById('error_message');
    var errorMessage = document.getElementById('error_message' + id);
    // console.log(nexterrorMessage)
    
    if (input.files && input.files[0]) {
        var file = input.files[0];
        var extension = file.name.split('.').pop().toLowerCase();
        
        if (allowedExtensions.indexOf(extension) === -1) {
            
            document.getElementById('error_message' + id).innerHTML = 'Only JPG, JPEG, PNG, and WEBP extensions are allowed.';
            var buttonClass = document.getElementById('add_more_btn').className;
            document.getElementById('add_more_btn').className = buttonClass + ' disabled-link';
            errorMessage.style.display = 'block';

        } else if (file.size > maxFileSize) {
  
          var buttonClass = document.getElementById('add_more_btn').className;
            document.getElementById('add_more_btn').className = buttonClass + ' disabled-link';
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
                $('#multiple_image' + id).attr('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    }
}

      </script>

      @endsection