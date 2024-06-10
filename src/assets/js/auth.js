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

document.addEventListener("DOMContentLoaded", function () {
	const signupForm = document.querySelector('#signup-card form');
	const passwordInput = document.getElementById('password');
	const confirmPasswordInput = document.getElementById('confirm-password');
  
	signupForm.addEventListener('submit', function (event) {
	  if (passwordInput.value !== confirmPasswordInput.value) {
		event.preventDefault(); // Prevent form submission
		alert("Passwords do not match!");
	  }
	});
  });
  
