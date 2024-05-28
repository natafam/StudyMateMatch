<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <title>StudyMateMatch</title>
    <meta charset="utf-8"/>
    <meta name="robots" content="noindex"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="keywords" content="StudyMateMatch, korepetycje, pomoc uczniowska"/>
    <meta name="description" content="StudyMateMatch – strona internetowa pomocy uczniowskiej stworzona na lekcje projektowania oprogramowania."/>
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
        href="./Images/favicon.svg"
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
    <script>
        window.onload = function() {
            // Sprawdzenie, czy użytkownik zgadza się na użycie ciasteczek
            if (localStorage.getItem('cookiesAccepted') !== 'true') {
                // Wyświetlenie ostrzeżenia o użyciu ciasteczek
                var acceptCookies = confirm("Ta strona korzysta z ciasteczek. Proszę o zrozumienie i akceptację.");
                if (acceptCookies) {
                    // Ustawienie ciasteczka, które wskazuje, że użytkownik zgadza się na użycie ciasteczek
                    document.cookie = 'cookiesAccepted=true; path=/; max-age=31536000'; // Ciasteczko ważne przez 1 rok
                    // Zapisanie informacji o zgodzie w localStorage
                    localStorage.setItem('cookiesAccepted', 'true');
                }
            }
        };
    </script>
</head>

<body>
    
    <?php
        $isLoggedIn = isset($_SESSION['User_type']) && $_SESSION['User_type'] == 'User';
        $isLoggedIn = isset($_SESSION['User_type']) && $_SESSION['User_type'] == 'Teacher';
    ?>

    <link rel="stylesheet" href="./Styles/style.css"/>
    <div>
        <link rel="stylesheet" href="./Styles/index.css"/>
        <div class="home-main-container">


            <section class="home-hero">

                <?php if (!isset($_COOKIE['logged_in'])): ?>
                    <header class="navbar">

                        <div class="left-navbar">
                            <a href="./index.php" class="navbar-link">
                                <img alt="Logo StudyMateMatch" src="./Images/Branding/logo.svg" class="navbar-logo"/>
                            </a>

                            <nav class="navbar-links">
                                <a href="./HTML/login.php" id="navlink-question-ask">Zadaj pytanie</a>
                            </nav>

                            <div class="navbar-search">
                                <input type="text" placeholder="Szukaj pytania" class="navbar-textinput input book-input"/>
                                <button class="button button-main" id="search-icon">
                                    <img src="./Images/Icons/search-white.svg" class="navbar-icon">
                                </button>
                            </div>
                        </div>
                        <div class="right-navbar">
                            <a href="./HTML/register.php" class="button button-main" id="navbar-register">
                            <span class="text">Dołącz już teraz!</span>
                            </a>
                            <a href="./HTML/login.php" class="button button-main" id="navbar-login">
                            <span class="text">Zaloguj się</span>
                            </a>
                        </div>

                        <div class="burger-menu button">
                            <img src="./Images/Icons/burger-menu-white.svg" class="navbar-icon">
                        </div>
                        <div class="shown-menu" style="display: none;">
                            <div class="nav">
                                <div class="navbar-container">
                                    <a href="./index.php">
                                        <img src="./Images/Branding/logo.svg" class="navbar-logo"/>
                                    </a>
                                    <div class="menu-close">
                                        <img src="./Images/Icons/close-black.svg" class="navbar-icon" id="close-icon">
                                    </div>
                                </div>
                                <nav class="nav">
                                    <a href="./HTML/how-it-works.php" class="navlink">Dlaczego warto?</br>Jak to działa?</a>
                                    <a href="./HTML/all-subjects.php" class="navlink">Nasze przedmioty szkolne</a>
                                    <a href="./HTML/login.php" class="navlink">Zadaj pytanie</a>
                                    <a href="./HTML/all-questions.php" class="navlink">Pytania społeczności</a>
                                    <a href="./HTML/reserve-lesson.php" class="navlink">Zaplanuj lekcję</a>
                                    <a href="./HTML/calendar.php" class="navlink">Terminarz </a>
                                    <a href="#contact" class="navlink">Kontakt</a>
                                    <a href="./HTML/register.php" class="navlink" id="nav-register">Dołącz już teraz!</a>
                                    <a href="./HTML/login.php" class="button button-main" id="nav-login">
                                        <span class="text">Zaloguj się</span>
                                    </a>
                                </nav>
                            </div>
                        </div>

                        <script src="./JavaScript/burger-menu.js"></script>
                    </header>
                <?php endif; ?>

                <?php if (isset($_COOKIE['logged_in'])): ?>
                    <header class="navbar">
                        <div class="left-navbar">
                            <a href="./index.php" class="navbar-link">
                                <img alt="Logo StudyMateMatch" src="./Images/Branding/logo.svg" class="navbar-logo"/>
                            </a>

                            <nav class="navbar-links">
                                <a href="./HTML/question-ask.php" id="navlink-question-ask">Zadaj pytanie</a>
                            </nav>

                            <div class="navbar-search">
                                <input type="text" placeholder="Szukaj pytania" class="navbar-textinput input book-input"/>
                                <button class="button button-main" id="search-icon">
                                    <img src="./Images/Icons/search-white.svg" class="navbar-icon">
                                </button>
                            </div>
                        </div>

                        <div class="logged-user-button button button-main">
                            <span class="logged-user-text"><a href="./HTML/user-interface.php" class="logged-user-text">Mój profil</a><br/></span>
                            <img src="./Images/Icons/user.svg" class="logged-user-icon"/> 
                        </div>     
                        <div class="logged-user-menu" style="display: none;">
                            <a href="./HTML/account-settings.php" class="logged-user-navlink">Ustawienia konta</a>
                            <a href="./PHP/log-out.php" class="logged-user-navlink" id="user-log-out">Wyloguj</a>
                        </div>            

                        <div class="burger-menu button">
                            <img src="./Images/Icons/burger-menu-white.svg" class="navbar-icon">
                        </div>
                        <div class="shown-menu" style="display: none;">
                            <div class="nav">
                                <div class="navbar-container">
                                    <a href="./index.php">
                                        <img src="./Images/Branding/logo.svg" class="navbar-logo"/>
                                    </a>
                                    <div class="menu-close">
                                        <img src="./Images/Icons/close-black.svg" class="navbar-icon" id="close-icon">
                                    </div>
                                </div>
                                <nav class="nav">
                                    <a href="./HTML/how-it-works.php" class="navlink">Dlaczego warto?</br>Jak to działa?</a>
                                    <a href="./HTML/all-subjects.php" class="navlink">Nasze przedmioty szkolne</a>
                                    <a href="./HTML/question-ask.php" class="navlink">Zadaj pytanie</a>
                                    <a href="./HTML/all-questions.php" class="navlink">Pytania społeczności</a>
                                    <a href="./HTML/reserve-lesson.php" class="navlink">Zaplanuj lekcję</a>
                                    <a href="./HTML/calendar.php" class="navlink">Terminarz </a>
                                    <a href="#contact" class="navlink">Kontakt</a>
                                </nav>
                            </div>
                        </div>

                        <script src="./JavaScript/burger-menu.js"></script>
                        <script src="./JavaScript/logged-user-menu.js"></script>
                    </header>
                <?php endif; ?>


                <div id="main" class="home-main">
                    <div class="home-content">
                        <div class="home-heading">
                            <h1 class="home-header">Odkryj potęgę wspólnej nauki z naszą platformą!</h1>
                            <p class="home-caption">Nauka staje się przyjemnością, gdy masz odpowiedniego towarzysza!</p>
                        </div>
                        <a href="./HTML/reserve-lesson.php" class="home-reserve-lesson button button-main">
                            <img src="./Images/Icons/calendar-white.svg" class="home-image"/>
                            <span>Zaplanuj pierwszą lekcję!</span>
                        </a>
                    </div>
                    <div class="home-main-teacher-image">
                        <img alt="Nauczyciel" src="./Images/teacher-image.png" class="home-teacher-image"/>
                    </div>
                </div>


                <div id="features" class="home-features">
                    <div class="home-features-content">

                        <div class="feature-section quick-links">
                            <div class="feature-heading">
                                <h3 class="feature-header"><span>Pomoc</span></h3>
                                <img src="./Images/Icons/tick-white.svg" class="feature-icon"/>
                            </div>
                            <p class="feature-text">
                                <span>Skorzystaj z łatwo dostępnej pomocy tysięcy uczniów i nauczycieli z całej Polski.</span>
                            </p>
                            <div class="feature-divider"></div>
                        </div>

                        <div class="feature-section quick-links">
                            <div class="feature-heading">
                                <h3 class="feature-header"><span>Pytania i odpowiedzi</span></h3>
                                <img src="./Images/Icons/tick-white.svg" class="feature-icon"/>
                            </div>
                            <p class="feature-text">
                                <span>Poszerz swoją wiedzę dzięki szczegółowym odpowiedziom społeczności naszej platformy.</span>
                            </p>
                            <div class="feature-divider"></div>
                        </div>

                        <div class="feature-section quick-links">
                            <div class="feature-heading">
                                <h3 class="feature-header"><span>Korepetycje</span></h3>
                                <img src="./Images/Icons/tick-white.svg" class="feature-icon"/>
                            </div>
                            <p class="feature-text">
                                <span>Przyspiesz swoją naukę dzięki natychmiastowemu wsparciu doświadczonych ekspertów.</span>
                            </p>
                            <div class="feature-divider"></div>
                        </div>
                        
                    </div>
                </div>
                
                <div class="home-background"></div>
            </section>


            <section id="why" class="home-why">
                <div class="home-why-content">
                    <h2 class="home-h2">Dlaczego warto skorzystać z StudyMateMatch?</h2>
                    <ul class="home-ul list">
                        <li class="home-why-li list-item">
                            <h4 class="home-why-h4">Dostępność 24/7</h4>
                            <span class="home-why-text">Bez względu na to, kiedy masz pytanie lub potrzebujesz korepetycji, nasza platforma jest dostępna przez całą dobę.</span>
                        </li>
                        <li class="home-why-li list-item">
                            <h4 class="home-why-h4">Szeroki wybór korepetytorów</h4>
                            <span class="home-why-text">Dzięki dużej liczbie korepetytorów online znajdziesz idealnego nauczyciela dopasowanego do Twoich potrzeb.</span>
                        </li>
                        <li class="home-why-li list-item">
                            <h4 class="home-why-h4">Wsparcie społeczności</h4>
                            <span class="home-why-text">Nasza aktywna społeczność jest gotowa udzielić Ci pomocy i wsparcia w każdej dziedzinie nauki.</span>
                        </li>
                    </ul>
                </div>
            </section>
      

            <section id="how-it-works" class="home-how">
                <div class="home-how-heading">
                    <h2 class="home-h2">Jak to działa?</h2>
                    <p class="home-how-paragraph">Dzięki StudyMateMatch nauka staje się łatwiejsza i bardziej dostępna niż kiedykolwiek wcześniej. Dołącz już dziś i zdobądź wsparcie, którego potrzebujesz, aby osiągnąć sukces w nauce!</p>
                </div>
                <div class="home-how-content" id="how-background-1">
                    <div class="home-how-section">
                        <h3 class="home-how-h4">Znajdź idealnego korepetytora</h3>
                        <p class="home-how-description">Na StudyMateMatch masz dostęp do szerokiej gamy korepetytorów online, którzy pomogą Ci w nauce. Możesz wybierać spośród rówieśników, którzy są dobrzy w danym przedmiocie i chcą się podzielić swoją wiedzą z innymi. Jeśli natomiast preferujesz bardziej tradycyjne podejście, możesz również znaleźć tutaj wykwalifikowanych nauczycieli z wieloletnim doświadczeniem.</p>
                    </div>
                </div>
                <div class="home-how-content" id="how-background-2">
                    <div class="home-how-section">
                        <h3 class="home-how-h4">Wybierz swoje kryteria</h3>
                        <p class="home-how-description">Kiedy już wiesz, z czego potrzebujesz pomocy, użyj naszych zaawansowanych filtrów wyszukiwania, aby znaleźć korepetytora idealnie dopasowanego do Twoich wymagań. Możesz wybierać spośród różnych kategorii przedmiotów, preferowanych godzin lekcyjnych, terminów zajęć i wiele innych, aby znaleźć korepetytora, który najlepiej pasuje do Twojego stylu nauki i harmonogramu.</p>
                    </div>
                </div>
                <div class="home-how-content" id="how-background-3">
                    <div class="home-how-section">
                        <h3 class="home-how-h4">Zadaj pytanie społeczności</h3>
                        <p class="home-how-description">Jeśli masz pytanie z danego przedmiotu lub potrzebujesz pomocy przy rozwiązaniu konkretnego problemu, skorzystaj z naszej funkcji zadawania pytań społeczności. Możesz opublikować pytanie i poczekać na odpowiedzi od innych użytkowników platformy, którzy mogą podzielić się swoją wiedzą i doświadczeniem z Tobą. To świetny sposób, aby uzyskać dodatkową pomoc i wsparcie w nauce.</p>
                    </div>
                </div>
                <div class="home-how-content" id="how-background-4">
                    <div class="home-how-section">
                        <h3 class="home-how-h4">Rozpocznij naukę już dziś</h3>
                        <p class="home-how-description">Gdy już znalazłeś odpowiedniego korepetytora lub otrzymałeś odpowiedź na nurtujące Cię pytanie, możesz z łatwością rozpocząć naukę! Umów się na lekcję online, korzystając z naszego wbudowanego systemu harmonogramowania, lub kontynuuj naukę samodzielnie, wykorzystując wskazówki i informacje uzyskane od społeczności StudyMateMatch.</p>
                    </div>
                </div>
            </section>


            <section id="subjects" class="home-subjects">
                <div class="home-subjects-heading">
                    <h3 class="home-subjects-h3">Przedmioty szkolne, z których możesz uzyskać pomoc</h3>
                    <p class="home-subjects-paragraph">Dla każdego coś dobrego. Wybieraj spośród wszystkich dostępnych szkolnych przedmiotów.</p>
                </div>
                <div class="home-subjects-content">
                    <div class="subjects-grid">
                        <a href="">
                            <div class="home-subject-wrapper">
                                <div class="subject-description">
                                    <div class="subject-description-heading">
                                        <div class="subject-description-container">
                                            <img alt="Matematyka" src="./Images/Icons/Subjects/math.svg" class="subject-icon"/>
                                            <div class="subject-description-name">
                                                <div class="subject-description-header">
                                                    <h3 class="subject-description-h3"><span>Matematyka</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="subject-caption"><span>Od arytmetyki przez geometrię aż po algebrę, nasi korepetytorzy pomogą Ci zrozumieć skomplikowane koncepcje matematyczne i rozwiązać zadania praktyczne.</span></p>
                                    </div>
                                    <div class="subject-read-more">
                                        <span class="subject-search">Szukaj studymate'a</span>
                                        <img src="./Images/Icons/arrow-black.svg" class="subject-arrow-icon"/>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="">
                            <div class="home-subject-wrapper">
                                <div class="subject-description">
                                    <div class="subject-description-heading">
                                        <div class="subject-description-container">
                                            <img alt="Polski" src="./Images/Icons/Subjects/polish.svg" class="subject-icon"/>
                                            <div class="subject-description-name">
                                                <div class="subject-description-header">
                                                    <h3 class="subject-description-h3"><span>Polski</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="subject-caption"><span>Czy to interpretacja tekstów literackich, gramatyka czy praca nad wypracowaniami, nasi nauczyciele pomogą Ci doskonalić umiejętności językowe i literackie.</span></p>
                                    </div>
                                    <div class="subject-read-more">
                                        <span class="subject-search">Szukaj studymate'a</span>
                                        <img src="./Images/Icons/arrow-black.svg" class="subject-arrow-icon"/>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="">
                            <div class="home-subject-wrapper">
                                <div class="subject-description">
                                    <div class="subject-description-heading">
                                        <div class="subject-description-container">
                                            <img alt="Angielski" src="./Images/Icons/Subjects/english.svg" class="subject-icon"/>
                                            <div class="subject-description-name">
                                                <div class="subject-description-header">
                                                    <h3 class="subject-description-h3"><span>Angielski</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="subject-caption"><span>Niezależnie od poziomu zaawansowania nasi korepetytorzy z angielskiego pomogą Ci zboostować umiejętności czytania, pisania, słuchania i mówienia w języku angielskim.</span></p>
                                    </div>
                                    <div class="subject-read-more">
                                        <span class="subject-search">Szukaj studymate'a</span>
                                        <img src="./Images/Icons/arrow-black.svg" class="subject-arrow-icon"/>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="">
                            <div class="home-subject-wrapper">
                                <div class="subject-description">
                                    <div class="subject-description-heading">
                                        <div class="subject-description-container">
                                            <img alt="Biologia" src="./Images/Icons/Subjects/biology.svg" class="subject-icon"/>
                                            <div class="subject-description-name">
                                                <div class="subject-description-header">
                                                    <h3 class="subject-description-h3"><span>Biologia</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="subject-caption"><span>Zrozumienie procesów biologicznych może być trudne, ale nasi tutorzy wesprą Cię w opanowaniu tych zagadnień, przedstawiając fascynujący świat życia i natury.</span></p>
                                    </div>
                                    <div class="subject-read-more">
                                        <span class="subject-search">Szukaj studymate'a</span>
                                        <img src="./Images/Icons/arrow-black.svg" class="subject-arrow-icon"/>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="">
                            <div class="home-subject-wrapper">
                                <div class="subject-description">
                                    <div class="subject-description-heading">
                                        <div class="subject-description-container">
                                            <img alt="Fizyka" src="./Images/Icons/Subjects/physics.svg" class="subject-icon"/>
                                            <div class="subject-description-name">
                                                <div class="subject-description-header">
                                                    <h3 class="subject-description-h3"><span>Fizyka</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="subject-caption"><span>Od mechaniki przez termodynamikę do elektromagnetyzm, pomożemy Ci zrozumieć prawa fizyki i zastosować je w praktyce, przygotowując Cię do kartkówek, sprawdzianów i egzaminów.</span></p>
                                    </div>
                                    <div class="subject-read-more">
                                        <span class="subject-search">Szukaj studymate'a</span>
                                        <img src="./Images/Icons/arrow-black.svg" class="subject-arrow-icon"/>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="">
                            <div class="home-subject-wrapper">
                                <div class="subject-description">
                                    <div class="subject-description-heading">
                                        <div class="subject-description-container">
                                            <img alt="Chemia" src="./Images/Icons/Subjects/chemistry.svg" class="subject-icon"/>
                                            <div class="subject-description-name">
                                                <div class="subject-description-header">
                                                    <h3 class="subject-description-h3"><span>Chemia</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="subject-caption"><span>Czy to równania chemiczne, właściwości substancji, pierwiastki czy związki chemiczne, nasi chemicy i chemiczki pomogą Ci zrozumieć świat molekuł i atomów od podstaw.</span></p>
                                    </div>
                                    <div class="subject-read-more">
                                        <span class="subject-search">Szukaj studymate'a</span>
                                        <img src="./Images/Icons/arrow-black.svg" class="subject-arrow-icon"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <a href="./HTML/all-subjects.php" class="home-all button button-main">
                        <span>Wszystkie przedmioty</span>
                    </a>
                </div>
            </section>


            <section id="meet" class="home-meet">
                <div class="home-meet-heading">
                    <h2 class="home-h2">Poznaj naszych najlepszych nauczycieli</h2>
                    <p class="home-meet-paragraph">Znajdź idealnego i sprawdzonego korepetytora z wybranego przez Ciebie przedmiotu.</p>
                </div>

                <div class="home-meet-list">
                    <div class="home-teachers">

                        <div class="teacher-describe teacher-describe-root-class-name">
                            <img alt="Anna Kowalska" src="./Images/Teachers/teacher-1.jpeg" class="teacher-image"/>
                            <div class="teacher-describe-heading">
                                <h2 class="teacher-name"><span>Anna Kowalska</span></h2>
                                <p class="teacher-capition"><span>Od lat z zaangażowaniem pomaga uczniom zrozumieć złożone zagadnienia geograficzne.</span></p>
                            </div>
                        </div>
                        
                        <div class="teacher-describe teacher-describe-root-class-name">
                            <img alt="Piotr Nowicki" src="./Images/Teachers/teacher-2.jpeg" class="teacher-image"/>
                            <div class="teacher-describe-heading">
                                <h2 class="teacher-name"><span>Piotr Nowicki</span></h2>
                                <p class="teacher-capition"><span>Pasjonata matematyki, który z niezwykłą łatwością zaraża swoją pasją innych.</span></p>
                            </div>
                        </div>

                        <div class="teacher-describe teacher-describe-root-class-name">
                            <img alt="Monika Zając" src="./Images/Teachers/teacher-3.jpeg" class="teacher-image"/>
                            <div class="teacher-describe-heading">
                                <h2 class="teacher-name"><span>Monika Zając</span></h2>
                                <p class="teacher-capition"><span>Biolożka, którą pasjonuje odkrywanie tajemnic natury i wspieranie uczniów w zrozumieniu fascynującego życia na Ziemi.</span></p>
                            </div>
                        </div>

                        <div class="teacher-describe teacher-describe-root-class-name">
                            <img alt="Barbara Nowak" src="./Images/Teachers/teacher-4.jpeg" class="teacher-image"/>
                            <div class="teacher-describe-heading">
                                <h2 class="teacher-name"><span>Barbara Nowak</span></h2>
                                <p class="teacher-capition"><span>Anglistka, która szczerze interesuje się nauką języków i motywuje uczniów do osiągania sukcesów.</span></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="home-teacher-search">
                    <input type="text" placeholder="Wyszukaj korepetytora" class="teacher-search-textinput input book-input"/>
                    <button class="teacher-search button button-main"><span>Szukaj</span></button>
                </div>
            </section>


            <section id="schedule" class="home-schedule">
                <div class="home-schedule-content">
                    <div class="home-schedule-heading">
                        <h2 class="home-schedule-h2">Skorzystaj z harmonogramu, aby uporządkować swoje wirtualne lekcje</h2>
                        <p class="home-schedule-text">Umów się już dziś na lekcję, a nasz terminarz pomoże ci poukładać zaplanowane zajęcia w formie łatwego i intuicyjnego kalendarza z zaznaczonymi datami i godzinami.</p>
                    </div>
                    <div class="home-schedule-link">
                        <a href="./HTML/calendar.php" class="home-calendar button button-main button-white">
                        <span>Zobacz swój kalendarz</span>
                        </a>
                    </div>
                </div>
            </section>


            <div class="home-prefooter">
                <div class="home-prefooter-container">
                    <img alt="image" src="./Images/student-image.png" class="home-student-image"/>
                    <div class="home-prefooter-content">
                        <h3 class="home-prefooter-h3">Zacznij naukę z StudyMateMatch już teraz!</h3>
                        <div class="home-prefooter-buttons">
                            <a href="./HTML/reserve-lesson.php" class="home-button button button-main" id="prefooter-reserve-lesson">
                                <span>Zaplanuj lekcję</span>
                            </a>

                            <?php if (!$isLoggedIn): ?>
                                <a href="./HTML/login.php" class="home-button button button-main" id="prefooter-question-ask">
                                    <span>Zadaj pytanie</span>
                                </a>
                            <?php endif; ?>

                            <?php if ($isLoggedIn): ?>
                                <a href="./HTML/question-ask.php" class="home-button button button-main" id="prefooter-question-ask">
                                    <span>Zadaj pytanie</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="home-footer">
                <div class="home-footer-container">
                    <div class="home-footer-logo-container">
                        <img alt="image" src="./Images/Branding/logo.svg" class="home-footer-logo"/>
                    </div>
                    <div class="home-links-container">
                        <div class="footer-container-about">
                            <div class="home-about">
                                <span class="home-footer-strong">O nas</span>
                                <a href="" class="home-footer-link"><span>Kim jesteśmy?</span></a>
                                <a href="" class="home-footer-link"><span>Nasze wartości</span></a>
                                <a href="" class="home-footer-link"><span>Warunki użytkowania</span></a>
                                <a href="" class="home-footer-link"><span>Polityka prywatności</span></a>
                            </div>
                        </div>
                        <div class="footer-container-contact">
                            <div id="contact" class="home-contact">
                                <span class="home-footer-strong">Kontakt</span>
                                <span class="home-footer-email"><a href="mailto:kontakt@studymatematch.com">kontakt@studymatematch.com</a></span>
                                <span class="home-footer-phone"><a href="tel:+48123456789">(+48) 123 456 789</a></span>
                            </div>
                            <div class="home-socials">
                                <span class="home-footer-follow">
                                    <span>Zaobserwuj nas!</span><br/>
                                </span>
                                <div class="home-socials-icons">
                                    <a href="" class="home-footer-fb"><img alt="Facebook" src="./Images/Icons/facebook.svg"/></a>
                                    <a href="" class="home-footer-ig"><img alt="Instagram" src="./Images/Icons/instagram.svg"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="home-separator"></div>
                <span class="home-copyright">© 2024 StudyMateMatch | Natalia Michałowska, kl. 3A | ZSTI</span>
            </footer>


        </div>
    </div>
</body>
</html>
