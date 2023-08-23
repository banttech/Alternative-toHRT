let connectE;

function processOrder(tokenCallback = function(response){}) {
    processPaymentToken(tokenCallback);
}

function processPaymentToken(tokenCallback = function(response){}) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/access-tokens', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
    xhr.onreadystatechange = function() {
        processPaymentTokenRequestStateChange(xhr, tokenCallback);
    }

    let amount = document.getElementById("total__bill").value;
    amount = Math.round(amount);
    
    const transactionType = 'SALE';
    const orderId = 1122;
    const orderDescription = 'Description';

    let params = "amount=" + amount + "&transactionType=" + transactionType + "&orderId=" +
        orderId + "&orderDescription=" + orderDescription;

    xhr.send(params);
}

function processPaymentTokenRequestStateChange(xhr, tokenCallback = function(response){}) {
    if (xhr.readyState !== 4) {
        return;
    }
    if (xhr.status !== 201) {
        console.error("unexpected api response code", xhr.status, xhr.responseText);

        const btnOrder = document.getElementById("btnOrder");
        btnOrder.disabled = false;
        btnOrder.innerText = "Submit"

        enableOrderFormInputs();
        showErrorMessage("An api error occurred, please check console.log for details");

        return;
    }

    const response = JSON.parse(xhr.responseText);
    if (typeof response.id === 'undefined') {
        console.error("unexpected api response", response);
        showErrorMessage("An api error occurred, please check console.log for details");
        return;
    }

    document.getElementById("inputOrderPaymentToken").value = response.id;

    if (typeof tokenCallback === 'function') {
        tokenCallback(response);
        processStartPayment();
    }
}

function processStartPayment() {
    payConfig.paymentDetails.amount = document.getElementById("total__bill").value;
    payConfig.paymentDetails.paymentToken = document.getElementById("inputOrderPaymentToken").value;

    connectE = new Connect.ConnectE(payConfig, displayErrors);

    document.getElementById("inputOrderPaymentToken").setAttribute('readonly', "true");
    document.getElementById("sectionPay").classList.remove('hidden');
    document.getElementById("loading").classList.remove('hidden');
    setTimeout(function(){
        document.getElementById("loading").classList.add('hidden');
    }, 2000);

}

function processPayment(confirmPaymentCallback = function (response) {}) {
    const btnPay = document.getElementById("btnPay");
    btnPay.disabled = true;
    btnPay.innerText = "Loading...";

    connectE.executePayment()
        .then(function(data) {
            processPaymentSuccess(data, confirmPaymentCallback);
        }).catch(function(data) {
            processPaymentError(data);
        });
}

function processPaymentSuccess(data, confirmPaymentCallback = function (response) { }) {
    
    console.log('Payment successful', data);

    const baseUrl = window.location.origin;

    // ajax call to save order
    var coupon_code = '';
    var coupon_discount_percentage = '';
    var coupon_amount = '';

    // check if coupon is applied
    var check_coupon_applied = "{{ session()->has('coupon') }}";
    if (check_coupon_applied) {
      var coupon = JSON.parse('{!! json_encode(session()->get("coupon")) !!}');
      coupon_code = coupon.code;
      coupon_discount_percentage = coupon.discount_percentage;
      coupon_amount = "{{ $discount }}"
    }

    console.log('coupon_code', coupon_code);
    console.log('coupon_discount_percentage', coupon_discount_percentage);
    console.log('coupon_amount', coupon_amount);
    console.log('bill_first_name', document.getElementById('bill_first_name').value);

    $.ajax({
        url: save_order_url,
        type: 'POST',
        data: {
            _token: token,
            bill_first_name: document.getElementById('bill_first_name').value,
            bill_last_name: document.getElementById('bill_last_name').value,
            bill_company_name: document.getElementById('bill_company_name').value,
            bill_country_region: document.getElementById('bill_country_region').value,
            bill_address1: document.getElementById('bill_address1').value,
            bill_address2: document.getElementById('bill_address2').value,
            bill_town_city: document.getElementById('bill_town_city').value,
            bill_county: document.getElementById('bill_county').value,
            bill_postcode: document.getElementById('bill_postcode').value,
            bill_phone_number: document.getElementById('bill_phone_number').value,
            bill_email: document.getElementById('bill_email').value,
            ship_to_diff_address: document.getElementById('ship_to_diff_address').checked,
            coupon_code: coupon_code,
            coupon_discount_percentage: coupon_discount_percentage,
            coupon_amount: coupon_amount,
            // Check if "ship_to_diff_address" is checked, then include shipping details
            ...(document.getElementById('ship_to_diff_address').checked ? {
              ship_first_name: document.getElementById('ship_first_name').value,
              ship_last_name: document.getElementById('ship_last_name').value,
              ship_company_name: document.getElementById('ship_company_name').value,
              ship_country_region: document.getElementById('ship_country_region').value,
              ship_address1: document.getElementById('ship_address1').value,
              ship_address2: document.getElementById('ship_address2').value,
              ship_town_city: document.getElementById('ship_town_city').value,
              ship_county: document.getElementById('ship_county').value,
              ship_postcode: document.getElementById('ship_postcode').value,
            } : {}),
            payment_method: 'paymentsense',
            payment_order_id: data.orderID,
            total_amount: '{{ $cartTotal }}',
        },
        success: function (response) {
            if (response.status == 'success') {
                alert('Transaction completed by ' + details.payer.name.given_name);
                window.location.reload();
            } else {
                alert(response.message);
            }
            // window.location.replace(baseUrl + "/checkout/success");
        },
        error: function(xhr) {
            console.log('error', xhr);
        }
    });
}

function processPaymentError(data) {
    console.error('Payment request failed', data);

    // $.ajax({
    //     url: orderFailedPaymentSenseUrl,
    //     type: 'POST',
    //     data: {
    //         _token: token,
    //     },
    //     success: function(response) {},
    //     error: function(xhr) {
    //         console.log('error', xhr);
    //     }
    // });

    // const errorMsg = document.getElementById("errorMsg");
    // errorMsg.classList.remove('hidden');
    // errorMsg.innerText = "An api error occurred, please check console.log for details";

    // alert('Something went wrong, please try again later.');

    const btnPay = document.getElementById("btnPay");
    btnPay.disabled = false;
    btnPay.innerText = "Pay";

    if (typeof data === 'string') {
        document.getElementById("errors").innerText = data;
    }
    if (data && data.message) {
        document.getElementById("errors").innerText = data.message;
    }
}
