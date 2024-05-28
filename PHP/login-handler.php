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
    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

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
    $sql_teacher = "SELECT * FROM Teachers WHERE Teacher_email = ?";
    $stmt_teacher = $conn->prepare($sql_teacher);
    $stmt_teacher->bind_param("s", $email);
    $stmt_teacher->execute();
    $result_teacher = $stmt_teacher->get_result();
    echo "Teacher result: " . $result_teacher->num_rows . "<br>";

    // Sprawdzenie czy użytkownik jest zwykłym użytkownikiem
    $sql_user = "SELECT * FROM Users WHERE User_email = ?";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("s", $email);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    echo "User result: " . $result_user->num_rows . "<br>";

    if ($result_teacher->num_rows == 1) { // Jeśli znaleziono pasujące konto nauczyciela
        $row = $result_teacher->fetch_assoc();
        if (password_verify($password, $row['Teacher_password'])) { // Porównanie zahashowanego hasła
            $_SESSION['User_type'] = 'Teacher'; // Ustawienie typu użytkownika (nauczyciel) w sesji
            $_SESSION['Email'] = $email; // Ustawienie e-maila nauczyciela w sesji
            setcookie("logged_in", "true", time() + (86400 * 30), "/");
            echo "Redirecting to teacher interface...<br>";
            header("Location: ../HTML/teacher-interface.php");
            exit();
        }
    }

    if ($result_user->num_rows == 1) { // Jeśli znaleziono pasujące konto użytkownika
        $row = $result_user->fetch_assoc();
        if (password_verify($password, $row['User_password'])) { // Porównanie zahashowanego hasła
            $_SESSION['User_type'] = 'User'; // Ustawienie typu użytkownika (użytkownik) w sesji
            $_SESSION['Email'] = $email; // Ustawienie e-maila użytkownika w sesji
            $_SESSION['User_ID'] = $row['User_ID']; // Ustawienie ID użytkownika w sesji
            setcookie("logged_in", "true", time() + (86400 * 30), "/");
            header("Location: ../HTML/user-interface.php"); // Przekierowanie na stronę interfejsu użytkownika
            exit();
        }
    }

    // Komunikat o błędnych danych logowania
    $login_error = "Niepoprawny adres e-mail lub hasło.";
    echo $login_error;

    // Zamknięcie połączenia
    $conn->close();
}
?>
