<?php
// Rozpoczęcie sesji
session_start();

// Sprawdzenie, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Oczyszczenie danych wejściowych
    function sanitize_input($data) {
        global $conn;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $conn->real_escape_string($data);
        return $data;
    }

    // Oczyszczenie i pobranie danych z formularza
    $question = sanitize_input($_POST['question']);
    $subject = sanitize_input($_POST['subject']);
    $date = date("Y-m-d H:i:s");
    
    // Sprawdzenie, czy identyfikator użytkownika istnieje w sesji
    if (isset($_SESSION['User_ID'])) {
        $user_id = $_SESSION['User_ID']; // Pobieranie identyfikatora użytkownika z sesji
    } else {
        // Obsłużenie przypadku, gdy identyfikator użytkownika nie jest ustawiony w sesji
        echo "Error: User_ID not set in session.";
        exit();
    }

    /*
    // Przygotowanie zapytania SQL
    $sql = "INSERT INTO Questions (Question_text, Subject, Question_datetime, User_ID) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $question, $subject, $date, $user_id);

    // Wykonanie zapytania
    if ($stmt->execute()) {
        // Przekierowanie do strony potwierdzenia
        header("Location: ../HTML/question-sent.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    */

    // Rozpoczęcie transakcji
    $conn->begin_transaction();

    try {
        // Przygotowanie zapytania SQL
        $sql = "INSERT INTO Questions (Question_text, Subject, Question_datetime, User_ID) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $question, $subject, $date, $user_id);

        // Wykonanie zapytania
        if ($stmt->execute()) {
            // Zatwierdzenie transakcji
            $conn->commit();
            // Przekierowanie do strony potwierdzenia
            header("Location: ../HTML/question-sent.php");
            exit();
        } else {
            throw new Exception("Error executing query: " . $stmt->error);
        }
    } catch (Exception $e) {
        // Wycofanie transakcji w przypadku błędu
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Zamknięcie połączenia
    $conn->close();
}
?>
