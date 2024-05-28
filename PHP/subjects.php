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

// Pobranie przedmiotów z bazy danych
$sql = "SELECT * FROM Subjects";
$result = $conn->query($sql);
$options = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['Subject_ID'] . "'>" . $row['Subject'] . "</option>";
    }
}
$conn->close();

// Zwrócenie listy opcji
echo $options;
?>
