<?php
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
        // Assuming you have a database connection set up as $db
        global $db;

        $query = "INSERT INTO reminder (note_id, remind_at, is_sent) VALUES (?, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('isi', $this->note_id, $this->remind_at, $this->is_sent);
        $stmt->execute();
    }

    public static function getAllPendingReminders() {
        // Assuming you have a database connection set up as $db
        global $db;

        $query = "SELECT * FROM reminder WHERE is_sent = 0 AND remind_at <= NOW()";
        $result = $db->query($query);

        $reminders = [];
        while ($row = $result->fetch_assoc()) {
            $reminders[] = new self($row['note_id'], $row['remind_at'], $row['is_sent']);
        }

        return $reminders;
    }

    public function markAsSent() {
        // Assuming you have a database connection set up as $db
        global $db;

        $query = "UPDATE reminder SET is_sent = 1 WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
    }
}
?>
