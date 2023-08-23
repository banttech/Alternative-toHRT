<style>
    .cart-modal-content {
        width: 82% !important;
    }
    .cart-modal-header {
        border: none !important;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content cart-modal-content">
            <div class="modal-header pb-0 cart-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <a href="" id="cart-modal-product-link-img">
                    <img src="" alt="Product Image" width="300" id="cart-modal-image">
                </a>
                <p>
                    <a href="" id="cart-modal-product-link">
                        <strong id="cart-modal-product-name"></strong>
                    </a> was added to the cart
                </p>
                <p>Your cart: <strong id="cart-modal-total-price">£19.99</strong> | <label id="total-items-in-cart"></label></p>
            </div>
            <div class="modal-footer justify-content-center">
                <a href="{{route('cart.index')}}" class="btn btn-secondary btn-corner">View Cart</a>
                <button type="button" class="btn btn-primary" onclick="closeCartModal()">Continue Shopping</button>
            </div>
        </div>
    </div>
</div>

<script>
    function closeCartModal() {
        $('#cartModal').modal('hide');
    }
</script>