<?php
// Rozpoczęcie sesji
session_start();

// Konfiguracja
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'StudyMateMatch';

// Utworzenie połączenia
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pobieranie ID pytania z URL
$question_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($question_id > 0) {
    // Przygotowanie zapytania SQL
    $sql = "SELECT Q.Question_text, Q.Subject, Q.Question_datetime, U.User_nickname 
            FROM Questions Q 
            JOIN Users U ON Q.User_ID = U.User_ID
            WHERE Q.Question_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $question_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Sprawdzenie, czy pytanie zostało znalezione
    if ($result->num_rows > 0) {
        $question_data = $result->fetch_assoc();
    } else {
        $question_data = null;
    }

    $stmt->close();
} else {
    $question_data = null;
}

// Zamknięcie połączenia
$conn->close();
?>
