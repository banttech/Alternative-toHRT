$(document).ready(function() {
    $("#carousel").owlCarousel({
        autoplay: true,
        rewind: false,
        margin: 20,
        responsiveClass: true,
        autoHeight: true,
        smartSpeed: 800,
        nav: false,
        dots:false,
        responsive: {
          0: {
            items: 1
          },

          600: {
            items: 2
          },

          900: {
            items: 3
          },
      
          1024: {
            items: 3
          },
      
          1366: {
            items: 4
          }
        }
    });
    $(".hover").mouseleave(
      function () {
        $(this).removeClass("hover");
      }
    );
    var lowerSlider = document.querySelector('#lower');
    var  upperSlider = document.querySelector('#upper');
    
    document.querySelector('#two').value=upperSlider.value;
    document.querySelector('#one').value=lowerSlider.value;
    
    var  lowerVal = parseInt(lowerSlider.value);
    var upperVal = parseInt(upperSlider.value);
    
    upperSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);
    
        if (upperVal < lowerVal + 4) {
            lowerSlider.value = upperVal - 4;
            if (lowerVal == lowerSlider.min) {
            upperSlider.value = 4;
            }
        }
        document.querySelector('#two').value=this.value
    };
    
    lowerSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);
        if (lowerVal > upperVal - 4) {
            upperSlider.value = lowerVal + 4;
            if (upperVal == upperSlider.max) {
                lowerSlider.value = parseInt(upperSlider.max) - 4;
            }
        }
        document.querySelector('#one').value=this.value
    };    
  });
  let profile = document.querySelector('.profile');
  let menu = document.querySelector('.menu');
  
  profile.onclick = function () {
      menu.classList.toggle('active');
  }
  
