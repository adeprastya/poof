const loginCard = document.getElementById("login-card");
const loginAnchor = document.getElementById("login-anchor");
const logupCard = document.getElementById("logup-card");
const logupAnchor = document.getElementById("logup-anchor");

loginAnchor.addEventListener("click", () => {
	loginCard.style.transform = "translateY(-200vh)";
	logupCard.style.transform = "translateY(0)";
});

logupAnchor.addEventListener("click", () => {
	loginCard.style.transform = "translateY(0)";
	logupCard.style.transform = "translateY(200vh)";
});
