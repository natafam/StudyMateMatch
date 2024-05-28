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
    if (!empty($_POST["User_name"]) && !empty($_POST["User_surname"]) && !empty($_POST["User_nickname"]) && !empty($_POST["User_email"]) && !empty($_POST["User_password"])) {

        // Wstawienie danych do bazy danych
        $user_name = $_POST["User_name"];
        $user_surname = $_POST["User_surname"];
        $user_nickname = $_POST["User_nickname"];
        $user_email = $_POST["User_email"];
        $user_password = $_POST["User_password"];

        // Hashowanie hasła
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);

        // Wstawienie danych do tabeli Users
        $sql = "INSERT INTO Users (User_name, User_surname, User_nickname, User_email, User_password) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $user_name, $user_surname, $user_nickname, $user_email, $user_password);
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