const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if(entry.isIntersecting){
      entry.target.classList.add("show");
    } else {
      entry.target.classList.remove("show");
    }
  });
});

const hiddenElements = document.querySelectorAll(".hidden");
hiddenElements.forEach((el) => observer.observe(el));

/*
window.addEventListener('scroll', function() {
  const scrollPosition = window.scrollY;
  const scrollMax = window.outerHeight
  const opacity = (window.scrollY + window.innerHeight) / document.body.scrollHeight;
  //element.style.setProperty('--var-opacity', opacity);
  element.style.opacity = opacity;
});*/

const scrollElements = document.querySelectorAll('.my-element');
  window.addEventListener('scroll', function() {
    scrollElements.forEach(function(element) {
    const elementPosition = element.getBoundingClientRect().top;

    const screenEffect = 1/3;

    const viewportHeight = window.innerHeight;
    const ratio = (viewportHeight-elementPosition) / (viewportHeight*screenEffect);
    const opacity = Math.max(0, Math.min(1, ratio));;
    const translate = Math.max(0, Math.min(20, 20*ratio));;
    
    element.style.opacity = opacity;
    element.style.transform = `translateY(-${translate}%)`;
  });
});