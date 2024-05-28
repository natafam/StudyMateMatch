<?php
// Rozpoczęcie sesji
session_start();

// Zakończenie sesji
session_destroy();

// Zniszczenie ciasteczka
setcookie("logged_in", "", time() - 3600, "/"); // Ustawienie daty wygaśnięcia na czas wstecz

// Przekierowanie użytkownika z powrotem do strony logowania
header("Location: ../HTML/login.php");
exit();
?>
