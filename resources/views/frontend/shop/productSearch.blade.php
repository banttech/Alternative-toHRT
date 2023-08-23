<style>
  .overlay {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    background-color: rgb(247 247 247);
    overflow-x: hidden;
    transition: 0.5s;
  }

  .overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
  }

  .overlay .closebtn {
    position: absolute;
    top: 30px;
    right: 34px;
    font-size: 39px;
    border: 2px solid #ccc;
    border-radius: 50%;
    width: 42px;
    height: 42px;
    line-height: 18px;
    padding: 9px;
  }

  .overlay input {
    width: 39%;
    margin: 0 auto;
    padding: 12px 21px;
    border: 2px solid #ccc;
    border-radius: 7px;
    background: #fbfbfb;
  }

  .overlay a {
    color: #535151;
  }

  .overlay a:hover {
    color: #535151;
  }

  .main-div-products {
    width: 38%;
    margin: 0 auto;
    box-shadow: 2px 0px 14px 0 rgb(1 1 1 / 41%);
    padding: 22px;

  }

  .main-div-products img {
    width: 100%;
  }

  .product-name {
    text-align: left;
    padding-left: 20px;
  }

  .product-name h4 {
    font-size: 19px;
  }

  .product-name h5 {
    font-size: 17px;
    font-weight: 600;
  }

  .borders {
    border-bottom: 1px solid #dedede !important;
    padding: 15px;
  }

  .overlay input:focus {
    outline: none;
    border: 2px solid #ccc;
  }
</style>

<li><a href="#" onclick="openNav()"><i class="fa fa-search" aria-hidden="true"></i></a></li>
<!-- here search popup -->
<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <form action="{{ url('/') }}" method="GET" id="searchForm">
      <input type="text" placeholder="Search products..." name="search" value="{{ request()->input('search') }}" id="searchInput" onkeyup="searchProducts(this.value)">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
    <div class="main-div-products search__wrapper" id="search__wrapper" style="display: none;"> 
      <div id="dropdownResults">
        
      </div>
    </div>

  </div>
</div>
<!-- end search popup -->

<!-- // jQuery link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }

  function searchProducts(searchValue) {
    if (searchValue.length > 0) {
      $.ajax({
        url: "{{ route('searchProducts') }}",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
          searchValue: searchValue
        },
        success: function(response) {
          if (response.status == 1) {
            $('#search__wrapper').show();
            $('#dropdownResults').html(response.data);
          } else {
            $('#search__wrapper').hide();
          }
        }
      });
    } else {
      $('#search__wrapper').hide();
    }      
  }
</script>