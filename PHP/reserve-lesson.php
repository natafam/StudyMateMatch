<?php
// Połączenie z bazą danych
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
    if (!empty($_POST["Student_name"]) && !empty($_POST["Student_surname"]) && !empty($_POST["Student_email"]) && !empty($_POST["Student_phone"]) && !empty($_POST["Lesson_date"]) && !empty($_POST["Lesson_time"]) && !empty($_POST["Subject_ID"]) && !empty($_POST["Teacher_ID"])) {

        // Wstawienie danych do bazy danych
        $student_name = $_POST["Student_name"];
        $student_surname = $_POST["Student_surname"];
        $student_email = $_POST["Student_email"];
        $student_phone = $_POST["Student_phone"];
        $lesson_date = $_POST["Lesson_date"];
        $lesson_time = $_POST["Lesson_time"];
        $subject_id = $_POST["Subject_ID"];
        $teacher_id = $_POST["Teacher_ID"];

        // Wstawienie danych do tabeli Lessons
        $sql = "INSERT INTO Lessons (Student_name, Student_surname, Student_email, Student_phone, Lesson_date, Lesson_time, Subject_ID, Teacher_ID) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssii", $student_name, $student_surname, $student_email, $student_phone, $lesson_date, $lesson_time, $subject_id, $teacher_id);
        $stmt->execute();

        // Zamknięcie połączenia i przekierowanie na stronę success.php
        $stmt->close();
        $conn->close();
        header("Location: success.php");
        exit;
    } else {
        // Wyświetlenie komunikatu, jeśli pola formularza nie są wypełnione
        echo "Proszę wypełnić wszystkie pola formularza.";
    }
}

// Zamknięcie połączenia
$conn->close();
?>
