<?php

$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_DATABASE = 'poof';

$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
