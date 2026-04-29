const hamburger = document.querySelector(".hamburger");

hamburger.addEventListener("click", function() {
  this.classList.toggle("is-active");
});

const containerEl = document.querySelector('#mix-container');
const countEl = document.getElementById('count');

const mixer = mixitup(containerEl, {
    selectors: {
        target: '.mix'
    },
    animation: {
        duration: 400,
        effects: 'fade scale(0.8)'
    },
    callbacks: {
        onMixEnd: function(state) {
            countEl.innerText = state.totalShow;
        }
    }
});

const filterButtons = document.querySelectorAll('.filter-btn');

filterButtons.forEach(btn => {
    btn.addEventListener('click', function() {
        filterButtons.forEach(b => b.classList.remove('active'));
        this.classList.add('active');
    });
});


$('.comments').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  autoplay: true,
  autoplaySpeed: 3000,
  dotsClass: 'dots',
  pauseOnHover: false,
  prevArrow: $('.left'),
  nextArrow: $('.right'),
  pauseOnHover: true
});

new WOW().init();