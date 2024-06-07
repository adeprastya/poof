const navToggle = document.getElementById("nav-toggle");
const vertical = document.querySelector(".vertical");
const horizontal = document.querySelector(".horizontal");
const main = document.querySelector("main");

const AppState = {
	navOpen: false,
	isMobile: window.innerWidth < 800
};

function restyle() {
	if (AppState.isMobile && AppState.navOpen) {
		navToggle.style.transform = "rotate(540deg)";

		vertical.style.transform = "translateX(0)";

		horizontal.style.width = "calc(100vw - clamp(200px, 18vw, 250px)";
		horizontal.style.filter = "blur(2px) brightness(80%)";

		main.style.width = "calc(100vw - clamp(200px, 18vw, 250px)";
		main.style.filter = "blur(4px) brightness(80%)";
	} else if (AppState.isMobile && !AppState.navOpen) {
		navToggle.style.transform = "rotate(0deg)";

		vertical.style.transform = "translateX(-75%)";

		horizontal.style.width = "calc(100vw - clamp(200px, 18vw, 250px) + calc(clamp(200px, 18vw, 250px) / 100 * 75)";
		horizontal.style.filter = "none";

		main.style.width = "calc(100vw - clamp(200px, 18vw, 250px) + calc(clamp(200px, 18vw, 250px) / 100 * 75)";
		main.style.filter = "none";
	} else if (!AppState.isMobile && AppState.navOpen) {
		navToggle.style.transform = "rotate(540deg)";

		vertical.style.transform = "translateX(0)";

		horizontal.style.width = "calc(100vw - clamp(200px, 18vw, 250px)";
		horizontal.style.filter = "none";

		main.style.width = "calc(100vw - clamp(200px, 18vw, 250px)";
		main.style.filter = "none";
	} else if (!AppState.isMobile && !AppState.navOpen) {
		navToggle.style.transform = "rotate(0deg)";

		vertical.style.transform = "translateX(-75%)";

		horizontal.style.width = "calc(100vw - clamp(200px, 18vw, 250px) + calc(clamp(200px, 18vw, 250px) / 100 * 75)";
		horizontal.style.filter = "none";

		main.style.width = "calc(100vw - clamp(200px, 18vw, 250px) + calc(clamp(200px, 18vw, 250px) / 100 * 75)";
		main.style.filter = "none";
	}
}
restyle();

window.addEventListener("resize", () => {
	AppState.isMobile = window.innerWidth < 800;
	AppState.navOpen = false;

	restyle();
});

navToggle.addEventListener("click", () => {
	AppState.navOpen = !AppState.navOpen;

	restyle();
});

const noteMenuToggles = document.querySelectorAll(".note-menu-toggle");
const noteMenus = document.querySelectorAll(".note-menu");

noteMenuToggles.forEach((noteMenuToggle, i) => {
	noteMenuToggle.addEventListener("click", () => {
		noteMenus[i].classList.toggle("opened");
	});
});
