<?php
require_once '../config/db.php';

class Reminder {
    public $id;
    public $note_id;
    public $remind_at;
    public $is_sent;

    public function __construct($note_id, $remind_at, $is_sent = 0) {
        $this->note_id = $note_id;
        $this->remind_at = $remind_at;
        $this->is_sent = $is_sent;
    }

    public function save() {
        global $conn;

        if ($conn === null) {
            die("Database connection not initialized.");
        }

        $query = "INSERT INTO reminder (note_id, remind_at, is_sent) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param('isi', $this->note_id, $this->remind_at, $this->is_sent);
        $stmt->execute();
    }

    public static function getAllPendingReminders() {
        global $conn;

        if ($conn === null) {
            die("Database connection not initialized.");
        }

        $query = "SELECT * FROM reminder WHERE is_sent = 0 AND remind_at <= NOW()";
        $result = $conn->query($query);

        if ($result === false) {
            die("Query failed: " . $conn->error);
        }

        $reminders = [];
        while ($row = $result->fetch_assoc()) {
            $reminders[] = new self($row['note_id'], $row['remind_at'], $row['is_sent']);
            $reminders[count($reminders) - 1]->id = $row['id'];
        }

        return $reminders;
    }

    public function markAsSent() {
        global $conn;

        if ($conn === null) {
            die("Database connection not initialized.");
        }

        $query = "UPDATE reminder SET is_sent = 1 WHERE id = ?";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
    }
}
?>
