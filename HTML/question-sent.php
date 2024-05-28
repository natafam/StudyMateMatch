<?php
// Rozpoczęcie sesji
session_start();

// Sprawdzenie, czy użytkownik jest zalogowany
    // if (!isset($_SESSION['user_id'])) {
    //     header("Location: login.html");
    //     exit();
    // }

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

// Ustawienie domyślnego warunku WHERE
$where_clause = "";

// Sprawdzenie, czy użytkownik wybrał przedmiot
if(isset($_GET['subject']) && !empty($_GET['subject'])) {
    $subject_filter = $_GET['subject'];
    $where_clause = " WHERE Q.Subject = ?";
}

// Aktualizacja zapytania SQL z uwzględnieniem filtra przedmiotu
$sql = "SELECT Q.Question_text, Q.Subject, Q.Question_datetime, U.User_nickname 
        FROM Questions Q 
        JOIN Users U ON Q.User_ID = U.User_ID"
        . $where_clause . 
        " ORDER BY Q.Question_datetime DESC";

// Przygotowanie zapytania
$stmt = $conn->prepare($sql);

// Dodanie wartości filtra przedmiotu, jeśli został wybrany
if(!empty($where_clause)) {
    $stmt->bind_param("s", $subject_filter);
}

// Wykonanie zapytania
$stmt->execute();
$result = $stmt->get_result();

/*
// Pobranie pytania zapisanych przez użytkownika
// $user_id = $_SESSION['user_id']; // Zakładamy, że user_id jest przechowywany w sesji
$sql = "SELECT Q.Question_text, Q.Subject, Q.Question_datetime, U.User_nickname 
        FROM Questions Q 
        JOIN Users U ON Q.User_ID = U.User_ID
        ORDER BY Q.Question_datetime DESC";
$stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
*/

// Zamknięcie połączenia
$conn->close();
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <title>Pytanie wysłane | StudyMateMatch</title>
    <meta charset="utf-8"/>
    <meta name="robots" content="noindex"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Natalia Michałowska"/>

    <style data-tag="reset-style-sheet">
        html {
          line-height: 1.15;
        }
        body {
          margin: 0;
        }
        * {
          box-sizing: border-box;
          border-width: 0;
          border-style: solid;
        }
        p, li, ul, pre, div, h1, h2, h3, h4, h5, h6, figure, blockquote, figcaption {
          margin: 0;
          padding: 0;
        }
        button {
          background-color: transparent;
        }
        button, input, optgroup, select, textarea {
          font-family: inherit;
          font-size: 100%;
          line-height: 1.15;
          margin: 0;
        }
        button, select {
          text-transform: none;
        }
        button, [type="button"], [type="reset"], [type="submit"] {
          -webkit-appearance: button;
        }
        button::-moz-focus-inner, [type="button"]::-moz-focus-inner, [type="reset"]::-moz-focus-inner, [type="submit"]::-moz-focus-inner {
          border-style: none;
          padding: 0;
        }
        button:-moz-focus, [type="button"]:-moz-focus, [type="reset"]:-moz-focus, [type="submit"]:-moz-focus {
          outline: 1px dotted ButtonText;
        }
        a {
          color: inherit;
          text-decoration: inherit;
        }
        input {
          padding: 2px 4px;
        }
        img {
          display: block;
        }
        html {
          scroll-behavior: smooth;
        }
    </style>
    
    <style data-tag="default-style-sheet">
        html {
          font-family: Poppins;
          font-size: 16px;
        }
        body {
          font-weight: 400;
          font-style:normal;
          text-decoration: none;
          text-transform: none;
          letter-spacing: normal;
          line-height: 1.15;
          color: var(--dl-color-gray-black);
          background-color: var(--dl-color-gray-white);
        }
    </style>
      
    <link
        rel="shortcut icon"
        href="../Images/favicon.svg"
        type="icon/svg"
        sizes="32x32"
   />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        data-tag="font"
   />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        data-tag="font"
   />
</head>

<body>
    <link rel="stylesheet" href="../Styles/style.css"/>
    <div>
        <link rel="stylesheet" href="../Styles/question-sent.css"/>
        <div class="question-sent-main-container">


            <section class="question-sent-hero">

                <header class="navbar">
                    <div class="left-navbar">
                        <a href="../index.php" class="navbar-link">
                            <img alt="Logo StudyMateMatch" src="../Images/Branding/logo.svg" class="navbar-logo"/>
                        </a>

                        <nav class="navbar-links">
                            <a href="./question-ask.php" id="navlink-question-ask">Zadaj pytanie</a>
                        </nav>

                        <div class="navbar-search">
                            <input type="text" placeholder="Szukaj pytania" class="navbar-textinput input book-input"/>
                            <button class="button button-main" id="search-icon">
                                <img src="../Images/Icons/search-white.svg" class="navbar-icon">
                            </button>
                        </div>
                    </div>

                    <div class="logged-user-button button button-main">
                        <span class="logged-user-text"><a href="./user-interface.php" class="logged-user-text">Mój profil</a><br/></span>
                        <img src="../Images/Icons/user.svg" class="logged-user-icon"/> 
                    </div>     
                    <div class="logged-user-menu" style="display: none;">
                        <a href="./account-settings.php" class="logged-user-navlink">Ustawienia konta</a>
                        <a href="../PHP/log-out.php" class="logged-user-navlink" id="user-log-out">Wyloguj</a>
                    </div>            

                    <div class="burger-menu button">
                        <img src="../Images/Icons/burger-menu-white.svg" class="navbar-icon">
                    </div>
                    <div class="shown-menu" style="display: none;">
                        <div class="nav">
                            <div class="navbar-container">
                                <a href="../index.php">
                                    <img src="../Images/Branding/logo.svg" class="navbar-logo"/>
                                </a>
                                <div class="menu-close">
                                    <img src="../Images/Icons/close-black.svg" class="navbar-icon" id="close-icon">
                                </div>
                            </div>
                            <nav class="nav">
                                <a href="./how-it-works.php" class="navlink">Dlaczego warto?</br>Jak to działa?</a>
                                <a href="./all-subjects.php" class="navlink">Nasze przedmioty szkolne</a>
                                <a href="./question-ask.php" class="navlink">Zadaj pytanie</a>
                                <a href="./all-questions.php" class="navlink">Pytania społeczności</a>
                                <a href="./reserve-lesson.php" class="navlink">Zaplanuj lekcję</a>
                                <a href="./calendar.php" class="navlink">Terminarz </a>
                                <a href="#contact" class="navlink">Kontakt</a>
                            </nav>
                        </div>
                    </div>

                    <script src="../JavaScript/burger-menu.js"></script>
                    <script src="../JavaScript/logged-user-menu.js"></script>
                </header>
            
            
                <section class="question-sent">
                    <div class="question-sent-heading">
                        <h2 class="question-sent-h2">Pytanie zadane!</h2>
                        <p class="question-sent-paragraph">Teraz musisz poczekać na odpowiedź od naszej społeczności. Zwykle czas odpowiedzi (aż 80% pytań) waha się do 10 minut.</p>
                    </div>
                </section>


                <section class="question-sent-other">

                    <div class="question-sent-other-heading">
                        <h2 class="question-sent-other-h2">Inne pytania naszej społeczności</h2>
                        <p class="question-sent-other-paragraph">Tutaj znajdziesz pytania zadane przez innych użytkowników. Może i dla Ciebie okażą się pomocne!</p>
                    </div>


                    <form method="get" action="">
                        <label for="subject"></label>

                        <div class="quesion-sent-filter-box">
                            <select name="subject" id="quesion-sent-subject">
                                <option value="Wybierz przedmiot">Wybierz przedmiot</option>
                                <option value="Matematyka">Matematyka</option>
                                <option value="Polski">Polski</option>
                                <option value="Angielski">Angielski</option>
                                <option value="Biologia">Biologia</option>
                                <option value="Fizyka">Fizyka</option>
                                <option value="Chemia">Chemia</option>
                                <option value="Geografia">Geografia</option>
                                <option value="Historia">Historia</option>
                                <option value="WOS">WOS</option>
                                <option value="Religia">Religia</option>
                                <option value="Informatyka">Informatyka</option>
                                <option value="Plastyka">Plastyka</option>
                                <option value="Historia sztuki">Historia sztuki</option>
                                <option value="Muzyka">Muzyka</option>
                                <option value="BiZ i PP">BiZ i PP</option>
                                <option value="EdB i BHP">EdB i BHP</option>
                                <option value="Niemiecki">Niemiecki</option>
                                <option value="Hiszpański">Hiszpański</option>
                                <option value="Włoski">Włoski</option>
                                <option value="Francuski">Francuski</option>
                                <option value="Rosyjski">Rosyjski</option>
                                <option value="Inne języki obce">Inne języki obce</option>
                            </select>

                            <div class="question-sent-filter">
                                <button type="submit" class="question-sent-submit button button-main">Filtruj</button>
                            </div>
                        </div>
                    </form>


                    <div class="question-sent-grid">

                        <?php while ($row = $result->fetch_assoc()): ?>
                            <div class="question-sent-item">
                                <div class="question-sent-box question-box-check-root-class-name">
                                    <div class="question-box-content">
                                        <div class="question-box-question">
                                            <div class="question-box-details">

                                                <span class="question-box-date">
                                                    <span>
                                                        <?php 
                                                        // Formatowanie daty
                                                        $formatted_date = date("d.m.Y", strtotime($row['Question_datetime']));
                                                        echo htmlspecialchars($formatted_date); 
                                                        ?>
                                                    </span>
                                                </span>

                                                <span class="question-box-user">
                                                    <span><?php echo htmlspecialchars($row['User_nickname']); ?></span>
                                                </span>

                                                <span class="question-box-subject">
                                                    <span><?php echo htmlspecialchars($row['Subject']); ?></span>
                                                </span>

                                            </div>
                                            <p class="question-box-question-text">
                                                <span><?php echo htmlspecialchars($row['Question_text']); ?></span>
                                            </p>
                                        </div>
                                        <div class="question-box-check-answer read-more">
                                            <span class="question-box-check-span">Sprawdź odpowiedzi</span>
                                            <img src="../Images/Icons/arrow-black.svg" class="question-box-check-image"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>

                        <!-- <div class="question-sent-item">
                            <div class="question-sent-box question-box-check-root-class-name">
                                <div class="question-box-content">
                                    <div class="question-box-question">
                                        <div class="question-box-details">
                                            <span class="question-box-date"><span>01.01.2024</span></span>
                                            <span class="question-box-user"><span>janek123</span></span>
                                            <span class="question-box-subject"><span>Matematyka</span></span>
                                        </div>
                                        <p class="question-box-question-text">
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                        </p>
                                    </div>
                                    <div class="question-box-check-answer read-more">
                                        <span class="question-box-check-span">Sprawdź odpowiedzi</span>
                                        <img src="../Images/Icons/arrow-black.svg" class="question-box-check-image"/>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>

                </section>

            </section>


            <footer class="footer footer-root-class-name">
                <div class="footer-container" id="footer-main-container">

                    <div class="footer-logo-container">
                        <img alt="image" src="../Images/Branding/logo.svg" class="footer-logo"/>
                    </div>

                    <span class="footer-copyright">© 2024 StudyMateMatch | Natalia Michałowska, kl. 3A | ZSTI</span>
                    
                    <div class="footer-container">
                        <div class="footer-container" id="footer-links-container">
                            <div id="contact" class="footer-contact">
                                <span class="footer-strong">Kontakt</span>
                                <span class="footer-contact-text" id="footer-email"><a href="mailto:kontakt@studymatematch.com">kontakt@studymatematch.com</a></span>
                                <span class="footer-contact-text" id="footer-phone"><a href="tel:+48123456789">(+48) 123 456 789</a></span>
                            </div>
                            <div class="footer-socials">
                                <span class="footer-strong">
                                    <span>Zaobserwuj nas!</span><br />
                                </span>
                                <div class="footer-socials-icons">
                                    <a href="" class="footer-facebook"><img alt="Facebook" src="../Images/Icons/facebook.svg"/></a>
                                    <a href="" class="footer-instagram"><img alt="Instagram" src="../Images/Icons/instagram.svg"/></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </footer>


        </div>
    </div>
</body>
</html>