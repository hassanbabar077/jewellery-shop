

$(document).ready(function () {
  $('.owl-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: false,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true,
    margin: 0,
    navText: ['<', '>'],
    dots: false,
  });
});

// Initialize Owl Carousel for section 1 slider
$('.section1-slider').owlCarousel({
  items: 4,
  loop: true,
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
});
// Initialize Owl Carousel for section 1 slider
$('.custom-owl-slider').owlCarousel({

  loop: true,
  autoplay: true,
  autoplayTimeout: 2000,
  autoplayHoverPause: true,
  margin: 10,
  responsive: {
    // breakpoint from 0 up
    0: {
      items: 1,
    },
    768: {
      items: 3,
    },
    1000: {
      items: 4,
    },
    1110: {
      items: 5,
    }
  }
});
// Initialize Owl Carousel for section 1 slider
$('.client-owl-slider').owlCarousel({
  items: 3,
  margin: 10,
  loop: true,
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  responsive: {
    // breakpoint from 0 up
    0: {
      items: 1,
    },
    // breakpoint from 480 up
    480: {
      items: 3,
    },
    // breakpoint from 768 up
    768: {
      items: 3,
    }
  }
});
$(function () {
  $('.count-number').each(function () {
    var $this = $(this);
    var to = $this.attr('data-to');
    var speed = $this.attr('data-speed');

    $({ countNum: $this.text() }).animate(
      {
        countNum: to
      },
      {
        duration: parseInt(speed),
        easing: 'linear',
        step: function () {
          $this.text(Math.floor(this.countNum));
        },
        complete: function () {
          $this.text(this.countNum);
        }
      }
    );
  });
});
// Script of navbar color change



$(window).on("scroll", function () {
  if ($(window).scrollTop() > 150) {
    $("#navbar").addClass("activee");
  } else {
    $("#navbar").removeClass("activee");
  }
});



$(document).ready(function() {
  $('#searchInput').on('input', function() {
    const searchQuery = $(this).val().toLowerCase();
    let foundResults = false;
    
    $('#jewelrySection .card').each(function() {
      const title = $(this).find('h3').text().toLowerCase();
      const content = $(this).find('h3').text().toLowerCase();

      if (title.includes(searchQuery) || content.includes(searchQuery)) {
        $(this).css('display', 'block');
        foundResults = true;
      } else {
        $(this).css('display', 'none');
      }
    });

    if (!foundResults) {
      $('#searchResults').text('No results found');
    } else {
      $('#searchResults').text('');
    }
  });
});



