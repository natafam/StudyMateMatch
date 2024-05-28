<?php
// Konfiguracja
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'StudyMateMatch';

// Utworzenie połączenia
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// Przetwarzanie formularza
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sprawdzenie wypełnienia wszystkich pól formularza
    if (!empty($_POST["Teacher_name"]) && !empty($_POST["Teacher_surname"]) && !empty($_POST["Teacher_phone"]) && !empty($_POST["Teacher_email"]) && !empty($_POST["Teacher_password"]) && !empty($_POST["Subject_ID"])) {

        // Wstawienie danych do bazy danych
        $teacher_name = $_POST["Teacher_name"];
        $teacher_surname = $_POST["Teacher_surname"];
        $teacher_phone = $_POST["Teacher_phone"];
        $teacher_email = $_POST["Teacher_email"];
        $teacher_password = $_POST["Teacher_password"];
        $subject_id = $_POST["Subject_ID"];

        // Hashowanie hasła
        $teacher_password = password_hash($teacher_password, PASSWORD_DEFAULT);

        // Wstawienie danych do tabeli Teachers
        $sql = "INSERT INTO Teachers (Teacher_name, Teacher_surname, Teacher_phone, Teacher_email, Teacher_password, Subject_ID) VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $teacher_name, $teacher_surname, $teacher_phone, $teacher_email, $teacher_password, $subject_id);
        $stmt->execute();

        // Zamknięcie połączenia i przekierowanie na stronę success.php
        $stmt->close();
        $conn->close();
        header("Location: ../HTML/login.php");
        exit;
    } else {
        // Wyświetlenie komunikatu, jeśli pola formularza nie są wypełnione
        echo "Proszę wypełnić wszystkie pola formularza.";
    }
}

// Zamknięcie połączenia
$conn->close();
?>
