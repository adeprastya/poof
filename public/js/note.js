const notes = document.querySelectorAll(".note");

// Edit Modal
const editModal = document.querySelector("#edit-modal");
const closeEditModal = editModal.querySelector(".close-edit-modal");
editModal.style.display = "none";

const hideEditModal = () => {
	editModal.style.display = "none";
};
const showEditModal = (data) => {
	editModal.style.display = "block";
	editModal.querySelector("input[name=id]").value = data.id;
	editModal.querySelector("input[name=title]").value = data.title;
	editModal.querySelector("textarea[name=content]").value = data.content;
};
closeEditModal.addEventListener("click", hideEditModal);

// Collab Modal
const collabModal = document.querySelector("#collab-modal");
const closeCollabModal = collabModal.querySelector(".close-collab-modal");
collabModal.style.display = "none";

const hideCollabModal = () => {
	collabModal.style.display = "none";
};
const showCollabModal = (data) => {
	collabModal.style.display = "block";
	collabModal.querySelector("input[name=id]").value = data.id;
};
closeCollabModal.addEventListener("click", hideCollabModal);

// Reminder Modal
const reminderModal = document.querySelector("#reminder-modal");
const closeReminderModal = reminderModal.querySelector(".close-reminder-modal");
reminderModal.style.display = "none";

const hideReminderModal = () => {
	reminderModal.style.display = "none";
};
const showReminderModal = (data) => {
	reminderModal.style.display = "block";
	reminderModal.querySelector("input[name=note_id]").value = data.id;
};
closeReminderModal.addEventListener("click", hideReminderModal);

// Logic
notes.forEach((note) => {
	const data = {
		id: note.getAttribute("data-id"),
		title: note.querySelector(".title").textContent,
		content: note.querySelector(".content").textContent
	};

	const toggle = note.querySelector(".note-menu-toggle");
	const menu = note.querySelector(".note-menu");
	const editBtn = menu.querySelector(".edit");
	const collabBtn = menu.querySelector(".collab");
	const reminderBtn = menu.querySelector(".reminder");

	toggle.addEventListener("click", () => {
		menu.classList.toggle("opened");
	});

	editBtn.addEventListener("click", () => {
		showEditModal(data);
	});

	collabBtn.addEventListener("click", () => {
		showCollabModal(data);
	});

	reminderBtn.addEventListener("click", () => {
		showReminderModal(data);
	});
});
