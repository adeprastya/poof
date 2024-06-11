document.addEventListener("DOMContentLoaded", function () {
	fetch("../controllers/get_user_reminders.php")
		.then((response) => response.json())
		.then((reminders) => {
			if (reminders.error) {
				console.error(reminders.error);
			} else {
				reminders.forEach((reminder) => {
					scheduleReminderNotification(reminder);
				});
			}
		})
		.catch((error) => {
			console.error(`Error: ${error.message}`);
		});
});

function scheduleReminderNotification(reminder) {
	const reminderTime = new Date(reminder.remind_at.replace(" ", "T")).getTime();
	const now = Date.now();
	const timeToNotification = reminderTime - now;

	if (timeToNotification > 0) {
		setTimeout(() => showNotification(reminder), timeToNotification);
	} else {
		console.log(`Reminder ID: ${reminder.id} is already past due.`);
	}
}

function showNotification(reminder) {
	if (Notification.permission === "granted") {
		new Notification(`Reminder: ${reminder.note_title}`, {
			body: `Scheduled at: ${reminder.remind_at}`
		});
	} else if (Notification.permission !== "denied") {
		Notification.requestPermission().then((permission) => {
			if (permission === "granted") {
				new Notification(`Reminder: ${reminder.note_title}`, {
					body: `Scheduled at: ${reminder.remind_at}`
				});
			}
		});
	}
}
