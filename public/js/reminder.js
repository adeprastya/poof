import { BASE_URL } from "./global.js";

fetch(BASE_URL + "/reminder/get")
	.then((response) => response.json())
	.then((reminders) => {
		reminders.forEach((reminder) => {
			scheduleReminderNotification(reminder);
		});
	})
	.catch((error) => {
		console.error(`Error: ${error.message}`);
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
		new Notification(`Poof... Hello ${reminder.name}, you have a note "${reminder.title}" to check`, {
			body: `Scheduled at: ${reminder.remind_at}`
		});
	} else if (Notification.permission !== "denied") {
		Notification.requestPermission().then((permission) => {
			if (permission === "granted") {
				new Notification(`Poof... Hello ${reminder.name}, you have a note "${reminder.title}" to check`, {
					body: `Scheduled at: ${reminder.remind_at}`
				});
			}
		});
	}
}
