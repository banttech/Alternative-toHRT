
<style>
    .cookiealert {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 31%;
        margin: 0 !important;
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        border-radius: 0;
        transform: translateY(100%);
        transition: all 500ms ease-out;
        color: #ecf0f1;
        /* background: rgb(33, 35, 39, 0.5); */
        background:rgb(28 44 22 / 85%);
        border-radius: 40px 0px 0px 0px;
        color:white;
    }
    
    .cookiealert.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0%);
        transition-delay: 1000ms;
    }
    
    .cookiealert a {
        text-decoration: underline
    }
    
    .cookiealert .acceptcookies {
        margin-left: 10px;
        vertical-align: baseline;
    }
    button.btn.btn-primary.btn-sm.acceptcookies {
        background: green;
    border-radius: 4px;
    border: none;
    padding: 7px 48px;
}

.cookiealert p{
    text-align: justify;
    padding: 9px;
    font-size: 15px;
    font-weight: 500;
    color:#fff;
}
@media only screen and (max-width: 768px){
    .cookiealert {
    width: 43%;
 }
}
@media only screen and (max-width: 540px){
.cookiealert {
    width: 50%;
}
.cookiealert p {
    font-size: 13px;
 }
}
@media only screen and (max-width: 360px){
.cookiealert {
       width: 93%;
 }
}
------------------------------------------------------------------
/* b, strong {
    font-weight: bolder;
    font-size: 14px;
} */
    </style>
    
    
    </head>
    
    <body>
    
    <div class="alert text-center cookiealert" role="alert">
        <p>We use cookies on our website to give you the most relevant experience by remembering your preferences and repeat visits. By clicking “Accept All”, you consent to the use of ALL the cookies. However, you may visit "Cookie Settings" to provide a controlled consent.</p>
        <button type="button" class="btn btn-primary btn-sm acceptcookies">Accept All</button>
    </div>
    
    
    <script>
    (function () {
        "use strict";
    
        var cookieAlert = document.querySelector(".cookiealert");
        var acceptCookies = document.querySelector(".acceptcookies");
    
        if (!cookieAlert) {
            return;
        }
    
        cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)
    
        // Show the alert if we cant find the "acceptCookies" cookie
        if (!getCookie("acceptCookies")) {
            cookieAlert.classList.add("show");
        }
    
        // When clicking on the agree button, create a 1 year
        // cookie to remember user's choice and close the banner
        acceptCookies.addEventListener("click", function () {
            setCookie("acceptCookies", true, 365);
            cookieAlert.classList.remove("show");
    
            // dispatch the accept event
            window.dispatchEvent(new Event("cookieAlertAccept"))
        });
    
        // Cookie functions from w3schools
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
    
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) === 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    })();
    </script>