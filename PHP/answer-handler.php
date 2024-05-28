<!-- ! PLIK NIEUŻYWANY ! -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>

<?php

session_start();

// Sprawdzenie, czy identyfikator użytkownika istnieje w sesji
if (isset($_SESSION['User_ID'])) {
    $user_id = $_SESSION['User_ID']; // Pobieranie identyfikatora użytkownika z sesji
} else {
    // Obsłużenie przypadku, gdy identyfikator użytkownika nie jest ustawiony w sesji
    echo "Error: User_ID not set in session.";
    exit();
}

// Konfiguracja bazy danych
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

// Sprawdzenie czy dane zostały przesłane metodą POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobranie danych z formularza
    $question_id = $_POST['question_id'];
    $answer_text = $_POST['answer_text'];
    $answer_datetime = date('Y-m-d H:i:s');
    $user_id = $_SESSION['User_ID']; // Zakładam, że ID użytkownika jest przechowywane w sesji

    // Zapytanie SQL do dodania odpowiedzi do tabeli Answers
    $sql = "INSERT INTO Answers (Answer_text, Answer_datetime, Question_ID, User_ID) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $answer_text, $answer_datetime, $question_id, $user_id);

    if ($stmt->execute()) {
        echo "Odpowiedź została dodana pomyślnie.";
        header("Location: ../HTML/question.php?question_id=" . $question_id);
    } else {
        echo "Błąd: " . $stmt->error;
    }

    $stmt->close();
}

// Zamknięcie połączenia
$conn->close();
?>
