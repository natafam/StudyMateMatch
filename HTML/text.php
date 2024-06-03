Tak jak w poprzednich moich pytaniach, posłuż się kodem PHP, żeby pozwolić zalogowanemu użytownikowi (sprawdź, jaki użytkownik jest zalogowany tak, jak w poprzednich moich zapytaniach) na zmianę swoich danych na koncie.

Struktura tabeli Users: User_ID, User_name, User_surname, User_nickname, User_email, User_password (zahashowane hasło przy rejestracji – $user_password = password_hash($user_password, PASSWORD_DEFAULT);).


Plik account-settings.php:
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <!-- Zawartość head -->
</head>

<body>
    <link rel="stylesheet" href="../Styles/style.css"/>
    <div>
        <link rel="stylesheet" href="../Styles/account-settings.css"/>
        <div class="account-settings-main-container">


            <section class="account-settings-hero">

                <header class="navbar">
                    <!-- Menu strony -->
                </header>

                
                <div class="account-settings-main">
                    <div class="account-settings-content">
                        <h2 class="account-settings-header">Ustawienia konta</h2>
                        <div class="account-settings-change-data">
                            <h3 class="account-settings-header1">Mój profil</h3>
                            <h4 class="account-settings-header2">Zmień dane</h4>
                            <input
                                type="text"
                                value=""
                                required="true"
                                placeholder="Imię"
                                autocomplete="given-name"
                                class="account-settings-name input"
                            />
                            <input
                                type="text"
                                value=""
                                required="true"
                                placeholder="Nazwisko"
                                autocomplete="family-name"
                                class="account-settings-surname input"
                            />
                            <input
                                type="text"
                                value=""
                                required="true"
                                placeholder="Pseudonim"
                                autocomplete="nickname"
                                class="account-settings-nickname input"
                            />
                            <input
                                type="email"
                                value=""
                                pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                                required="true"
                                placeholder="E-mail"
                                autocomplete="email"
                                class="account-settings-email input"
                            />
                            <button class="account-settings-confirm button button-main">
                                <span>Potwierdź zmianę danych</span>
                            </button>
                        </div>
                        <div class="account-settings-change-password">
                            <p class="account-settings-caption">Chciałbyś zmienić hasło?</p>
                            <h4 class="account-settings-caption1">Zmień hasło</h4>
                            <input
                                type="password"
                                required="true"
                                minlength="8"
                                placeholder="Stare hasło"
                                autocomplete="current-password"
                                class="account-settings-password input"
                            />
                            <input
                                type="password"
                                required="true"
                                minlength="8"
                                placeholder="Nowe hasło"
                                autocomplete="new-password"
                                class="account-settings-password1 input"
                            />
                            <button class="account-change-password-confirm button button-main">
                                <span>Potwierdź zmianę hasła</span>
                            </button>
                        </div>
                    </div>
                </div>

            </section>

            
            <footer class="footer">
                <!-- Stopka strony -->
            </footer>
        </div>
    </div>
</body>
</html>
