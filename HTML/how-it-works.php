<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <title>Jak to działa? | StudyMateMatch</title>
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
        <link rel="stylesheet" href="../Styles/how-it-works.css"/>
        <div class="how-it-works-main-container">


            <section class="how-it-works-hero">

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


                <section id="why" class="how-it-works-why">
                    <div class="how-it-works-heading">
                        <h2 class="how-it-works-header">Dlaczego warto skorzystać z StudyMateMatch?</h2>
                        <ul class="how-it-works-ul list">
                            <li class="how-it-works-li list-item">
                                <h4 class="how-it-works-h4">Dostępność 24/7</h4>
                                <span class="how-it-works-text-span">Bez względu na to, kiedy masz pytanie lub potrzebujesz korepetycji, nasza platforma jest dostępna przez całą dobę.</span>
                            </li>
                            <li class="how-it-works-li list-item">
                                <h4 class="how-it-works-h4">Szeroki wybór korepetytorów</h4>
                                <span class="how-it-works-text-span">Dzięki dużej liczbie korepetytorów online znajdziesz idealnego nauczyciela dopasowanego do Twoich potrzeb.</span>
                            </li>
                            <li class="how-it-works-li list-item">
                                <h4 class="how-it-works-h4">Wsparcie społeczności</h4>
                                <span class="how-it-works-text-span">Nasza aktywna społeczność jest gotowa udzielić Ci pomocy i wsparcia w każdej dziedzinie nauki.</span>
                            </li>
                        </ul>
                    </div>
                </section>


                <section id="how" class="how-it-works-how">
                    <div class="how-it-works-heading">
                        <h2 class="how-it-works-h2">Jak to działa?</h2>
                        <p class="how-it-works-paragraph">Dzięki StudyMateMatch nauka staje się łatwiejsza i bardziej dostępna niż kiedykolwiek wcześniej. Dołącz już dziś i zdobądź wsparcie, którego potrzebujesz, aby osiągnąć sukces w nauce!</p>
                    </div>
                    <div class="how-it-works-content" id="content-1">
                        <div class="how-it-works-section">
                            <h3 class="how-it-works-h3">Znajdź idealnego korepetytora</h3>
                            <p class="how-it-works-description">Na StudyMateMatch masz dostęp do szerokiej gamy korepetytorów online, którzy pomogą Ci w nauce. Możesz wybierać spośród rówieśników, którzy są dobrzy w danym przedmiocie i chcą się podzielić swoją wiedzą z innymi. Jeśli natomiast preferujesz bardziej tradycyjne podejście, możesz również znaleźć tutaj wykwalifikowanych nauczycieli z wieloletnim doświadczeniem.</p>
                        </div>
                    </div>
                    <div class="how-it-works-content" id="content-2">
                        <div class="how-it-works-section">
                            <h3 class="how-it-works-h3">Wybierz swoje kryteria</h3>
                            <p class="how-it-works-description">Kiedy już wiesz, z czego potrzebujesz pomocy, użyj naszych zaawansowanych filtrów wyszukiwania, aby znaleźć korepetytora idealnie dopasowanego do Twoich wymagań. Możesz wybierać spośród różnych kategorii przedmiotów, preferowanych godzin lekcyjnych, terminów zajęć i wiele innych, aby znaleźć korepetytora, który najlepiej pasuje do Twojego stylu nauki i harmonogramu.</p>
                        </div>
                    </div>
                    <div class="how-it-works-content" id="content-3">
                        <div class="how-it-works-section">
                            <h3 class="how-it-works-h3">Zadaj pytanie społeczności</h3>
                            <p class="how-it-works-description">Jeśli masz pytanie z danego przedmiotu lub potrzebujesz pomocy przy rozwiązaniu konkretnego problemu, skorzystaj z naszej funkcji zadawania pytań społeczności. Możesz opublikować pytanie i poczekać na odpowiedzi od innych użytkowników platformy, którzy mogą podzielić się swoją wiedzą i doświadczeniem z Tobą. To świetny sposób, aby uzyskać dodatkową pomoc i wsparcie w nauce.</p>
                        </div>
                    </div>
                    <div class="how-it-works-content" id="content-4">
                        <div class="how-it-works-section">
                            <h3 class="how-it-works-h3">Rozpocznij naukę już dziś</h3>
                            <p class="how-it-works-description">Gdy już znalazłeś odpowiedniego korepetytora lub otrzymałeś odpowiedź na nurtujące Cię pytanie, możesz z łatwością rozpocząć naukę! Umów się na lekcję online, korzystając z naszego wbudowanego systemu harmonogramowania, lub kontynuuj naukę samodzielnie, wykorzystując wskazówki i informacje uzyskane od społeczności StudyMateMatch.</p>
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