<?php
include '../PHP/question-handler.php';

// Rozpoczęcie sesji
session_start();

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

// // Pobranie identyfikatora pytania z parametrów URL
// if(isset($_GET['question_id'])) {
//     $question_id = $_GET['question_id'];

//     // Zapytanie SQL, aby pobrać pytanie o podanym identyfikatorze
//     $sql = "SELECT * FROM Questions WHERE Question_ID = $question_id";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $question_text = $row['Question_text'];
//         $subject = $row['Subject'];
//         $question_datetime = $row['Question_datetime'];
//         $user_id = $row['User_ID'];
//     } else {
//         echo "Brak wyników.";
//     }
// } else {
//     echo "Nie podano identyfikatora pytania.";
// }

// Zamknięcie połączenia
$conn->close();
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <title>Pytanie | StudyMateMatch</title>
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
    <?php
        $isLoggedIn = isset($_SESSION['User_type']) && $_SESSION['User_type'] == 'User';
        $isLoggedIn = isset($_SESSION['User_type']) && $_SESSION['User_type'] == 'Teacher';
    ?>

    <link rel="stylesheet" href="../Styles/style.css"/>
    <div>
        <link rel="stylesheet" href="../Styles/question.css"/>
        <div class="question-main-container">


            <section class="question-hero">

                <?php if (!isset($_COOKIE['logged_in'])): ?>
                    <header class="navbar">

                        <div class="left-navbar">
                            <a href="../index.php" class="navbar-link">
                                <img alt="Logo StudyMateMatch" src="../Images/Branding/logo.svg" class="navbar-logo"/>
                            </a>

                            <nav class="navbar-links">
                                <a href="./login.php" id="navlink-question-ask">Zadaj pytanie</a>
                            </nav>

                            <div class="navbar-search">
                                <input type="text" placeholder="Szukaj pytania" class="navbar-textinput input book-input"/>
                                <button class="button button-main" id="search-icon">
                                    <img src="../Images/Icons/search-white.svg" class="navbar-icon">
                                </button>
                            </div>
                        </div>
                        <div class="right-navbar">
                            <a href="./register.php" class="button button-main" id="navbar-register">
                            <span class="text">Dołącz już teraz!</span>
                            </a>
                            <a href="./login.php" class="button button-main" id="navbar-login">
                            <span class="text">Zaloguj się</span>
                            </a>
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
                                    <a href="./login.php" class="navlink">Zadaj pytanie</a>
                                    <a href="./all-questions.php" class="navlink">Pytania społeczności</a>
                                    <a href="./reserve-lesson.php" class="navlink">Zaplanuj lekcję</a>
                                    <a href="./calendar.php" class="navlink">Terminarz </a>
                                    <a href="#contact" class="navlink">Kontakt</a>
                                    <a href="./register.php" class="navlink" id="nav-register">Dołącz już teraz!</a>
                                    <a href="./login.php" class="button button-main" id="nav-login">
                                        <span class="text">Zaloguj się</span>
                                    </a>
                                </nav>
                            </div>
                        </div>

                        <script src="../JavaScript/burger-menu.js"></script>
                    </header>
                <?php endif; ?>

                <?php if (isset($_COOKIE['logged_in'])): ?>
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
                <?php endif; ?>


                <section class="question-questions">
                    <div class="question-heading">
                        <div class="question-content">

                            <section class="questions-container">
                                <div class="question-box question-box-root-class-name2">
                                    <div class="question-box-content">
                                        <?php if ($question_data): ?>
                                            <div class="question-box-question">
                                                <div class="question-details">
                                                    <span class="question-box-subject"><span><?php echo htmlspecialchars($question_data['Subject']); ?></span></span><br>
                                                    <span class="question-box-date"><span><?php echo date("d.m.Y", strtotime($question_data['Question_datetime'])); ?></span></span><br>
                                                    <span class="question-box-user"><span><?php echo htmlspecialchars($question_data['User_nickname']); ?></span></span>
                                                </div>
                                                <p class="question-box-question-text">
                                                    <span><?php echo htmlspecialchars($question_data['Question_text']); ?></span>
                                                </p>
                                            </div>
                                        <?php else: ?>
                                            <p>Nie znaleziono pytania.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </section>

                            <!-- <div class="question-box question-box-root-class-name2">
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
                                </div>
                            </div> -->


                            <section id="answers-container">
                                <?php
                                // Fetch and display existing answers from the database
                                $answers_sql = "SELECT * FROM Answers WHERE Question_ID = ?";
                                $answers_stmt = $conn->prepare($answers_sql);
                                $answers_stmt->bind_param("i", $question_id);
                                $answers_stmt->execute();
                                $answers_result = $answers_stmt->get_result();

                                while ($answer = $answers_result->fetch_assoc()):
                                ?>
                                    <div class="answer-box answer-box-root-class-name2">
                                        <div class="answer-box-content">
                                            <div class="answer-box-answer">
                                                <div class="answer-box-details">
                                                    <span class="answer-box-date"><?php echo date("d.m.Y", strtotime($answer['Answer_datetime'])); ?></span>
                                                    <span class="answer-box-user"><?php echo htmlspecialchars($answer['User_ID']); ?></span>
                                                </div>
                                                <p class="answer-box-answer-text">
                                                    <?php echo htmlspecialchars($answer['Answer_text']); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </section>

                            <div class="answer-box answer-box-root-class-name2">
                                <div class="answer-box-content">
                                    <div class="answer-box-answer">
                                        <div class="answer-box-details">
                                            <span class="answer-box-date"><span>01.01.2024</span></span>
                                            <span class="answer-box-user"><span>janek123</span></span>
                                        </div>
                                        <p class="answer-box-answer-text">
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <section id="new-answer-container">
                                <div class="new-answer-box">
                                    <div class="question-answer">
                                        <h2 class="answer-text">Dodaj swoją odpowiedź</h2>
                                        <form method="POST">
                                            <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
                                            <textarea name="answer_text" placeholder="Tutaj jest miejsce na Twoją odpowiedź!" class="answer-textarea textarea" required></textarea>
                                            <div class="answer-lower">
                                                <div class="answer-button">
                                                    <button type="submit" class="new-answer-sent button button-main"><span>Dodaj odpowiedź</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </section>

                        </div>
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

<?php
HandleRequest();
function HandleRequest()
{
    $DATA = $_POST;
    
    if (!isset($DATA) || empty($DATA))
        return $DATA;

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
    try
    {
        var_dump($conn->error);
        echo "entering";
        $result = $stmt->bind_param("ssii", $answer_text, $answer_datetime, $question_id, $user_id);
        echo "exiting";
    }
    catch (Exception $ex)
    {
        var_dump($result);
        return;
    }
    print_r($DATA);
    
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
}
?>