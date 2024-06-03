const nav = document.getElementById("nav");
const navClose = document.getElementById("nav-close");
const main = document.querySelector("main");

const AppState = {
	navOpen: false,
	isMobile: window.innerWidth < 800
};

function restyle() {
	if (AppState.isMobile && AppState.navOpen) {
		nav.style.transform = "translateX(0)";
		nav.style.borderRadius = "0 20px 20px 0";

		main.style.filter = "blur(4px)";
	} else if (AppState.isMobile && !AppState.navOpen) {
		nav.style.transform = "translateX(-75%)";
		nav.style.borderRadius = "0 0";

		main.style.filter = "none";
	} else if (!AppState.isMobile && AppState.navOpen) {
		nav.style.transform = "translateX(0)";
		nav.style.borderRadius = "0 20px 20px 0";

		main.style.filter = "none";
	} else if (!AppState.isMobile && !AppState.navOpen) {
		nav.style.transform = "translateX(-75%)";
		nav.style.borderRadius = "0 0";

		main.style.filter = "none";
	}
}
restyle();

window.addEventListener("resize", () => {
	AppState.isMobile = window.innerWidth < 800;
	AppState.navOpen = false;

	restyle();
});

navClose.addEventListener("click", () => {
	AppState.navOpen = !AppState.navOpen;

	restyle();
});
