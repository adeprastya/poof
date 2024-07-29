const notes = document.querySelectorAll(".note");

// Logic
notes.forEach((note) => {
	const toggle = note.querySelector(".note-menu-toggle");
	const menu = note.querySelector(".note-menu");

	toggle.addEventListener("click", () => {
		menu.classList.toggle("opened");
	});
});
