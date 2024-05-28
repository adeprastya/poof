const nav = document.getElementById("nav");
const navClose = document.getElementById("nav-close");

const AppState = {
	navOpen: true
};

navClose.addEventListener("click", () => {
	AppState.navOpen = !AppState.navOpen;

	if (AppState.navOpen) {
		nav.classList.remove("closed");
	} else {
		nav.classList.add("closed");
	}
	console.log("ok");
});
