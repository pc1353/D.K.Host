//const controller = new ScrollMagic.Controller();

//const animate = new ScrollMagic.Scene({
  //triggerElement: '.animate',
  //triggerHook: 0.7, // trigger when the top of the element is 70% from the top of the viewport
  //reverse: false // only trigger the animation once
//})
//.setClassToggle('.animate', 'active')
//.addTo(controller);


const animate = document.querySelector('#animate');
const windowHeight = window.innerHeight;

function animateOnScroll() {
  let scrollY = window.scrollY || window.pageYOffset;
  let triggerBottom = animate.getBoundingClientRect().top + scrollY + animate.offsetHeight;
  if (scrollY + windowHeight > triggerBottom) {
    animate.style.opacity = 1;
    animate.style.transform = 'translateY(0)';
    window.removeEventListener('scroll', animateOnScroll);
  }
}

window.addEventListener('scroll', animateOnScroll);
