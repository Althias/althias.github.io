
// toggle-nav 
const toggleBtns = document.querySelectorAll('.toggle-nav');
toggleBtns.forEach(btn => {
  btn.addEventListener('click', function () {
    const targetId = this.dataset.toggle;
    const sections = document.querySelectorAll('.section');

    sections.forEach(section => {
      if (section.id === targetId) {
        section.style.display = "block";
      } else {
        section.style.display = "none";
      }
    });
  });
});

// include navigation
const navigationContainer = document.querySelector("#navigation");
fetch("/assets/html/navigation.html")
  .then(response => response.text())
  .then(headerHTML => {
    navigationContainer.innerHTML = headerHTML;
  });

// include banner 
const bannerContainer = document.querySelector("#banner");
fetch("/assets/html/banner.html")
  .then(response => response.text())
  .then(headerHTML => {
    bannerContainer.innerHTML = headerHTML;
  });