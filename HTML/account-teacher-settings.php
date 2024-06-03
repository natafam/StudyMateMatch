<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <title>Ustawienia konta nauczyciela | StudyMateMatch</title>
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
        <link rel="stylesheet" href="../Styles/account-teacher-settings.css"/>
        <div class="account-teacher-settings-main-container">


            <section class="account-teacher-settings-hero">

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


                <section>
                    <div class="account-teacher-settings-main">
                        <div class="account-teacher-settings-content">
                            <h2 class="account-teacher-settings-header">Ustawienia konta nauczyciela</h2>
                            <div class="account-teacher-settings-change-data">
                                <h3 class="account-teacher-settings-header1">Mój profil</h3>
                                <h4 class="account-teacher-settings-header2">Zmień dane</h4>
                                <input
                                    type="text"
                                    value="name"
                                    required="true"
                                    placeholder="Imię"
                                    autocomplete="given-name"
                                    class="account-teacher-settings-name input"
                                />
                                <input
                                    type="text"
                                    value="surname"
                                    required="true"
                                    placeholder="Nazwisko"
                                    autocomplete="family-name"
                                    class="account-teacher-settings-surname input"
                                />
                                <input
                                    type="tel"
                                    value="phone"
                                    pattern="[0-9]{3}[0-9]{3}[0-9]{3}"
                                    required="true"
                                    placeholder="Nr telefonu"
                                    autocomplete="nickname"
                                    class="account-teacher-settings-phone input"
                                />
                                <input
                                    type="email"
                                    value="email"
                                    pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                                    required="true"
                                    placeholder="E-mail"
                                    autocomplete="email"
                                    class="account-teacher-settings-email input"
                                />
                                <button class="account-teacher-settings-confirm button button-main">
                                    <span>Potwierdź zmianę danych</span>
                                </button>
                            </div>

                            <div class="account-teacher-settings-change-password">
                                <p class="account-teacher-settings-caption">Chciałbyś zmienić hasło?</p>
                                <h4 class="account-teacher-settings-caption1">Zmień hasło</h4>
                                <input
                                    type="password"
                                    required="true"
                                    minlength="8"
                                    placeholder="Stare hasło"
                                    autocomplete="current-password"
                                    class="account-teacher-settings-password input"
                                />
                                <input
                                    type="password"
                                    required="true"
                                    minlength="8"
                                    placeholder="Nowe hasło"
                                    autocomplete="new-password"
                                    class="account-teacher-settings-password1 input"
                                />
                                <button class="account-teacher-settings-confirm1 button button-main">
                                    <span>Potwierdź zmianę hasła</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

            </section>


            <footer class="footer">
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
