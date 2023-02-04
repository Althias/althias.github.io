function burgerMenu() {
    const burger = document.querySelector("#burger-menu");
    const menu = document.querySelector("#nav-menu");

    burger.addEventListener("click", function() {
    menu.style.display = menu.style.display === "block" ? "none" : "block";
    });
}

function navDisplay () {
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
}