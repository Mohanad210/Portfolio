<?php
// 1. Läs datan från formuläret.
//    Nyckeln i $_POST är fältets name-attribut, t.ex. name="email" -> $_POST['email'].
//    ?? '' ger tom text om fältet saknas. trim() tar bort mellanslag före och efter.
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = $_POST['subject'] ?? '';
$jobType = $_POST['job_type'] ?? '';
$message = trim($_POST['message'] ?? '');
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tack för ditt meddelande – Mr X, webbutvecklare</title>
    <meta name="description" content="Bekräftelse på att Mr X har tagit emot ditt meddelande via kontaktformuläret.">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <a href="#main-content" class="skip-link">Hoppa till huvudinnehållet</a>

    <header class="site-header">
        <p class="site-header__name">Mr X</p>

        <!-- JS: Knappen visar och döljer menyn på mobilen.
             ACTION: toggle-menu (vad ska hända)
             DATA: data-menu-name="main" (vilken meny)
             TARGET: listan med data-js-target="nav-list" (var det syns) -->
        <button type="button" class="main-nav__toggle"
                aria-expanded="true" aria-controls="nav-list"
                data-js-action="toggle-menu"
                data-menu-name="main">
            Meny
        </button>

        <nav class="main-nav" aria-label="Huvudmeny">
            <ul class="main-nav__list" id="nav-list" data-js-target="nav-list">
                <li class="main-nav__item"><a class="main-nav__link" href="index.html">Om mig</a></li>
                <li class="main-nav__item"><a class="main-nav__link" href="kompetenser.html">Kompetenser</a></li>
                <li class="main-nav__item"><a class="main-nav__link" href="projekt.html">Projekt</a></li>
                <li class="main-nav__item"><a class="main-nav__link" href="utbildning.html">Utbildning och erfarenhet</a></li>
                <li class="main-nav__item"><a class="main-nav__link" href="referenser.html">Referenser</a></li>
                <li class="main-nav__item"><a class="main-nav__link" href="kontakt.html">Kontakt</a></li>
            </ul>
        </nav>
    </header>

    <main id="main-content" class="thank-you">
        <?php if ($name !== ''): ?>
            <h1 class="thank-you__title">Tack för ditt meddelande!</h1>
            <!-- 2. Skriv ut svaret. htmlspecialchars() gör att kod som någon
                    skrivit i formuläret visas som vanlig text (skydd mot XSS). -->
            <p class="thank-you__text">Hej <?= htmlspecialchars($name) ?>! Ditt ärende gäller: <?= htmlspecialchars($subject) ?> (<?= htmlspecialchars($jobType) ?>).</p>
            <p class="thank-you__text">Jag svarar till <?= htmlspecialchars($email) ?> inom två arbetsdagar.</p>
            <?php if ($message !== ''): ?>
                <p class="thank-you__text">Ditt meddelande: <?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
        <?php else: ?>
            <!-- Om någon öppnar tack.php utan att skicka formuläret -->
            <h1 class="thank-you__title">Inget meddelande skickades</h1>
            <p class="thank-you__text">Fyll i formuläret för att kontakta mig.</p>
        <?php endif; ?>
        <a class="thank-you__link" href="kontakt.html">Tillbaka till kontaktsidan</a>
    </main>

    <footer class="site-footer">
        <address class="site-footer__address">
            Mr X<br>
            <a class="site-footer__link" href="mailto:mr.x@example.com">mr.x@example.com</a><br>
            <a class="site-footer__link" href="https://github.com/Mohanad210/portfolio">Koden till portfolion på GitHub</a><br>
            <a class="site-footer__link" href="https://www.linkedin.com">Mr X på LinkedIn</a>
        </address>

        <!-- JS: När man klickar på knappen ska e-postadressen kopieras.
             ACTION: copy-email, DATA: data-email, TARGET: copy-status -->
        <button type="button" class="site-footer__action"
                data-js-action="copy-email"
                data-email="mr.x@example.com">
            Kopiera e-postadressen
        </button>
        <p class="site-footer__status" data-js-target="copy-status" aria-live="polite"></p>

        <p class="site-footer__copyright">© 2026 Mr X</p>
    </footer>
</body>
</html>