<?php
// Rozpoczęcie sesji
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Konfiguracja
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'StudyMateMatch';

    // Utworzenie połączenia
    $conn = new mysqli($db_host, $db_host, $db_password, $db_name);

    // Sprawdzenie połączenia
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Funkcja zabezpieczająca dane przed SQL Injection
    function sanitize_input($data) {
        global $conn;
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $conn->real_escape_string($data);
        return $data;
    }

     // Oczyszczenie oraz pobranie e-maila i hasła z formularza
    $email = sanitize_input($_POST['Email']);
    $password = sanitize_input($_POST['Password']);

    // Sprawdzenie czy użytkownik jest nauczycielem
    $sql_teacher = "SELECT * FROM Teachers WHERE Teacher_email = ? AND Teacher_password = ?";
    $stmt_teacher = $conn->prepare($sql_teacher);
    $stmt_teacher->bind_param("ss", $email, $password);
    $stmt_teacher->execute();
    $result_teacher = $stmt_teacher->get_result();

    if ($result_teacher->num_rows == 1) { // Jeśli znaleziono pasujące konto nauczyciela
        $row = $result_teacher->fetch_assoc();
        if (password_verify($password, $row['Teacher_password'])) { // Porównanie zahashowanego hasła
            $_SESSION['User_type'] = 'Teacher'; // Ustawienie typu użytkownika w sesji
            header("Location: ../HTML/teacher-interface.php"); // Przekierowanie na stronę interfejsu nauczyciela
            exit();
        }
    }

    // Sprawdzenie czy użytkownik jest zwykłym użytkownikiem
    $sql_user = "SELECT * FROM Users WHERE User_email = ? AND User_password = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("ss", $email, $password);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();

    if ($result_user->num_rows == 1) { // Jeśli znaleziono pasujące konto użytkownika
        $row = $result_user->fetch_assoc();
        if (password_verify($password, $row['User_password'])) { // Porównanie zahaszowanego hasła
            $_SESSION['User_type'] = 'User'; // Ustawienie typu użytkownika w sesji
            header("Location: ../HTML/user-interface.php"); // Przekierowanie na stronę interfejsu użytkownika
            exit();
        }
    }

    // Komunikat o błędnych danych logowania
    $login_error = "Niepoprawny adres e-mail lub hasło.";

    // Zamknięcie połączenia
    $conn->close();
}
?>
