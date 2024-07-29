const navToggle = document.getElementById("nav-toggle");
const vertical = document.querySelector(".vertical");
const horizontal = document.querySelector(".horizontal");
const main = document.querySelector("main");

const AppState = {
	navOpen: false,
	isMobile: window.innerWidth < 800
};

function applyStyles(element, styles) {
	for (const property in styles) {
		element.style[property] = styles[property];
	}
}

function getWidthCalculation(navOpen) {
	const baseWidth = "calc(100vw - clamp(200px, 18vw, 250px)";
	return navOpen ? baseWidth : `${baseWidth} + calc(clamp(200px, 18vw, 250px) / 100 * 75)`;
}

function restyle() {
	const transformValue = AppState.navOpen ? "rotate(540deg)" : "rotate(0deg)";
	const translateValue = AppState.navOpen ? "translateX(0)" : "translateX(-75%)";
	const widthCalc = getWidthCalculation(AppState.navOpen);
	const filterValueMobile = AppState.navOpen ? "blur(4px) brightness(80%)" : "none";
	const filterValueDesktop = "none";

	applyStyles(navToggle, { transform: transformValue });
	applyStyles(vertical, { transform: translateValue });

	const horizontalStyles = {
		width: widthCalc,
		filter: AppState.isMobile ? filterValueMobile : filterValueDesktop
	};

	const mainStyles = {
		width: widthCalc,
		filter: AppState.isMobile ? filterValueMobile : filterValueDesktop
	};

	applyStyles(horizontal, horizontalStyles);
	applyStyles(main, mainStyles);
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
