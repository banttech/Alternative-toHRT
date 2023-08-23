<style>
    .wishlist-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .wishlist-item .fa-times {
        margin-right: 10px;
    }

    .wishlist-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 10px;
    }

    .product-name {
        color: #000;
        text-decoration: none;
    }
</style>

@if(Auth::check())
@php
$totalWishlistItems = DB::table('wish_list')->where('user_id', Auth::user()->id)->get();
@endphp

<!-- WistList Modal -->
<div class="modal fade" id="wishListModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" id="wishlist-items-body">
            @include('frontend.shop.wishlistItems')
        </div>
    </div>
</div>
@endif

<script>
    function closeWishlistModel() {
        // remove show class from #wishListModel div
        $('#wishListModel').removeClass('show');
        $('#wishListModel').modal('hide');
        // also remove the modal-backdrop
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        // remove display block style from #wishListModel div
        $('#wishListModel').css('display', 'none');              
    }

    function openWishListModel() {
        $('#wishListModel').modal('show');
    }
</script>