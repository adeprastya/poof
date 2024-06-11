<?php
class Reminder implements JsonSerializable
{
    public $id;
    public $user_id;
    public $note_id;
    public $remind_at;
    public $note_title;

    public function __construct($user_id, $note_id, $remind_at, $note_title = null)
    {
        $this->user_id = $user_id;
        $this->note_id = $note_id;
        $this->remind_at = $remind_at;
        $this->note_title = $note_title;
    }

    public function create()
    {
        global $conn;
        if ($conn === null) {
            throw new Exception("Database connection not initialized.");
        }

        $query = "INSERT INTO reminder (user_id, note_id, remind_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param('iis', $this->user_id, $this->note_id, $this->remind_at);

        $result = $stmt->execute();
        if ($result === false) {
            throw new Exception("Execute failed: " . $stmt->error);
        }

        $stmt->close();
        return $result;
    }

    public static function getUserReminders($user_id)
    {
        global $conn;

        if ($conn === null) {
            throw new Exception("Database connection not initialized.");
        }

        $query = "
            SELECT reminder.id, reminder.user_id, reminder.note_id, reminder.remind_at, note.title AS note_title 
            FROM reminder 
            JOIN note ON reminder.note_id = note.id 
            WHERE reminder.user_id = ?
        ";

        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            throw new Exception("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result === false) {
            throw new Exception("Query failed: " . $conn->error);
        }

        $reminders = [];
        while ($row = $result->fetch_assoc()) {
            $reminder = new self($row['user_id'], $row['note_id'], $row['remind_at'], $row['note_title']);
            $reminder->id = $row['id'];
            $reminders[] = $reminder;
        }

        $stmt->close();

        return $reminders;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'note_id' => $this->note_id,
            'remind_at' => $this->remind_at,
            'note_title' => $this->note_title,
        ];
    }
}
