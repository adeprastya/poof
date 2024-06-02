const loginCard = document.getElementById("login-card");
const signupCard = document.getElementById("signup-card");
const loginAnchor = document.getElementById("login-anchor");
const signupAnchor = document.getElementById("signup-anchor");

loginAnchor.addEventListener("click", () => {
	loginCard.style.transform = "translateY(-200vh)";
	signupCard.style.transform = "translateY(0)";
});

signupAnchor.addEventListener("click", () => {
	loginCard.style.transform = "translateY(0)";
	signupCard.style.transform = "translateY(200vh)";
});
