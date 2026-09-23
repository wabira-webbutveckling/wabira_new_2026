<?php
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html lang="sv-SE">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Kontakta Wabira för en prisvärd och professionell hemsida. Svar inom 1-2 arbetsdagar.">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
    rel="stylesheet">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/ad5c36405b.js" crossorigin="anonymous"></script>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/styles.css">

  <!-- Favicon -->
  <link rel="icon" href="favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">

  <title>WABIRA | Kontakt</title>
</head>

<body class="d-flex flex-column min-vh-100">

  <!-- ===================== HEADER / NAV ===================== -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-sm" aria-label="Huvudmeny">
      <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand" href="index.html">WABIRA</a>

        <!-- Mobile menu toggle -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Öppna eller stäng navigationsmenyn">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav links + CTA -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-lg-center">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Hem</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html">Tjänster</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Om oss</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="portfolio.html">Projekt</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="contact.php">Kontakt</a>
            </li>
            <li class="nav-item ms-lg-3">
              <a class="btn custom-btn" href="contact.php">Kom igång!</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>
  </header>
  <!-- ==================== END HEADER ======================= -->


  <!-- ======================== MAIN ========================= -->
  <main id="main-content">

    <!-- PAGE INTRO -->
    <section class="pt-5" aria-labelledby="contact-heading">
      <div class="container text-center">

        <p class="eyebrow">Kontakt</p>
        <h1 class="about-hero-heading mb-3" id="contact-heading">Berätta om ditt projekt –<br class="d-none d-md-block"> jag återkommer inom 1–2 dagar</h1>
        <p class="section-subtitle mb-4">
          Vill du ha en prisvärd hemsida som känns professionell? Berätta lite om ditt företag och vad du behöver,
          så återkommer jag med ett tydligt upplägg och ett förslag – utan förpliktelser.
        </p>

        <!-- Trust pills -->
        <div class="d-flex flex-wrap justify-content-center gap-2">
          <span class="pill">Svar inom 1-2 arbetsdagar</span>
          <span class="pill">Tydligt prisförslag</span>
          <span class="pill">Anpassat efter din budget</span>
        </div>

      </div>
    </section>
    <!-- END PAGE INTRO -->

    <div class="section-divider"></div>

    <!-- CONTACT CONTENT — info + form -->
    <section class="pb-5" aria-labelledby="contact-heading">
      <div class="container pb-5">
        <div class="row g-4">

          <!-- ── Left column: contact info & process steps ── -->
          <div class="col-12 col-lg-5">

            <!-- Contact info card -->
            <div class="contact-card mb-4">
              <div class="contact-card-inner">
                <h2 class="section-title mb-2">Hör av dig</h2>
                <p class="contact-card-text mb-3">
                  Jag hjälper små företag att få en hemsida som är tydlig, lättskött och byggd för att skapa förtroende.
                </p>

                <div class="d-grid gap-2">
                  <!-- Byt till din e-post -->
                  <a class="btn-ghost" href="mailto:hej@wabira.se">hej@wabira.se</a>
                  <!-- Valfri: telefon eller socialt -->
                  <!-- <a class="btn-ghost" href="tel:+46701234567">+46 70 123 45 67</a> -->
                  <!-- <a class="btn-ghost" href="#" target="_blank" rel="noopener">Instagram</a> -->
                </div>

                <p class="help-note mt-3 mb-0">
                  Tips: Om du redan har en hemsida och vill göra ändringar - skriv gärna det i meddelandet,
                  så guidar jag dig rätt.
                </p>
              </div>
            </div>

            <!-- Process steps card -->
            <div class="contact-card">
              <div class="contact-card-inner">
                <h2 class="section-title mb-3">Vad händer efter att du skickat?</h2>

                <ol class="d-grid gap-3 mt-3 list-unstyled">

                  <li class="step">
                    <div class="step-number" aria-hidden="true">1</div>
                    <div>
                      <h3 class="contact-card-title">Kort avstämning</h3>
                      <p class="contact-card-text">
                        Vi går igenom mål, innehåll och vad som är viktigast för dina kunder.
                      </p>
                    </div>
                  </li>

                  <li class="step">
                    <div class="step-number" aria-hidden="true">2</div>
                    <div>
                      <h3 class="contact-card-title">Förslag &amp; pris</h3>
                      <p class="contact-card-text">
                        Du får ett tydligt upplägg med pris - anpassat efter din budget.
                      </p>
                    </div>
                  </li>

                  <li class="step">
                    <div class="step-number" aria-hidden="true">3</div>
                    <div>
                      <h3 class="contact-card-title">Design, bygg &amp; lansering</h3>
                      <p class="contact-card-text">
                        Jag tar fram en ren design och bygger en snabb, mobilvänlig hemsida.
                      </p>
                    </div>
                  </li>

                </ol>

                <p class="help-note mt-3 mb-0">
                  <strong>Obs:</strong> Jag kan gärna hjälpa med struktur och förslag, men du står vanligtvis
                  för texter och bilder (om du inte redan har material). Jag säger alltid till om något saknas,
                  så vi löser det enkelt.
                </p>
              </div>
            </div>

          </div>
          <!-- END left column -->

          <!-- ── Right column: contact form ── -->
          <div class="col-12 col-lg-7">

            <div class="contact-card">
              <div class="contact-card-inner">

                <h2 class="section-title mb-1" id="form-heading">Skicka ett meddelande</h2>
                <p class="contact-card-text mb-4">
                  Berätta gärna vad du behöver, ungefär hur många sidor du tänker och om du redan har en hemsida.
                </p>
                
            
                <form action="mail.php" method="post" aria-labelledby="form-heading">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">  
                  <div class="row g-3">

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="name">Namn</label>
                      <input
                        class="form-control"
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Ditt namn"
                        required>
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="company">Företag (valfritt)</label>
                      <input
                        class="form-control"
                        id="company"
                        name="company"
                        type="text"
                        placeholder="Ditt företag">
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="email">E-post</label>
                      <input
                        class="form-control"
                        id="email"
                        name="email"
                        type="email"
                        placeholder="namn@exempel.se"
                        required>
                    </div>

                    <div class="col-12 col-md-6">
                      <label class="form-label" for="type">Vad behöver du?</label>
                      <select class="form-select" id="type" name="type">
                        <option value="new-site">Ny hemsida</option>
                        <option value="changes">Ändringar på befintlig hemsida</option>
                        <option value="support">Löpande support</option>
                        <option value="unsure">Jag är osäker - hjälp mig välja</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label class="form-label" for="message">Meddelande</label>
                      <textarea
                        class="form-control"
                        id="message"
                        name="message"
                        rows="6"
                        placeholder="Ex: Jag vill ha en hemsida för mitt företag. Jag tänker ca 3-5 sidor och vill att den ska kännas varm och professionell. Jag har (inte) texter och bilder."
                        required></textarea>
                      <p class="help-note mt-2 mb-0">
                        Om du har en länk till en befintlig hemsida eller någon inspiration - lägg gärna med den.
                      </p>
                    </div>

       <!-- Honeypot — hidden from real users, bots fill it in -->
                    <div style="position:absolute; left:-9999px;" aria-hidden="true">
                      <label for="website">Lämna detta fält tomt</label>
                      <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- Form actions -->
                    <div class="col-12 d-grid d-md-flex justify-content-md-end gap-2 mt-2">
                      <a class="btn btn-ghost" href="services.html">Se paket &amp; priser</a>
                      <button class="btn custom-btn" type="submit">Skicka meddelande</button>
                    </div>

                  </div>
                </form>

              </div>
            </div>

            <!-- Privacy note -->
            <p class="mt-4 help-note text-center mb-0">
              Genom att skicka formuläret godkänner du att jag använder din information för att kunna
              återkoppla till dig.
            </p>

          </div>
          <!-- END right column -->

        </div>
      </div>
    </section>
    <!-- END CONTACT CONTENT -->

  </main>
  <!-- ====================== END MAIN ======================= -->


  <!-- ======================= FOOTER ======================== -->
  <footer class="py-5">
    <div class="text-center">

      <!-- Brand -->
      <div class="footer-brand mb-4">
        <a href="/" class="footer-logo text-decoration-none">WABIRA</a>
      </div>

      <!-- Footer nav -->
      <nav class="footer-nav mb-4" aria-label="Sidfot">
        <a href="services.html" class="footer-link">Tjänster</a>
        <a href="about.html" class="footer-link">Om oss</a>
        <a href="portfolio.html" class="footer-link">Projekt</a>
        <a href="contact.php" class="footer-link">Kontakt</a>
      </nav>

      <!-- Social icons -->
      <div class="footer-social mb-4" aria-label="Sociala medier">
        <a href="https://www.facebook.com/profile.php?id=61589348814467" class="social-link" aria-label="Facebook" target="_blank" rel="noopener">
          <i class="fa-brands fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="https://www.linkedin.com/company/wabira-webbutveckling/" class="social-link" aria-label="LinkedIn" target="_blank" rel="noopener">
          <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
        </a>
        <a href="#" class="social-link" aria-label="GitHub">
          <i class="fa-brands fa-github" aria-hidden="true"></i>
        </a>
      </div>

      <!-- Copyright -->
      <div class="footer-copy small">
        © <span id="year"></span> Wabira. All rights reserved.
      </div>

    </div>
  </footer>
  <!-- ===================== END FOOTER ====================== -->


  <!-- ======================= SCRIPTS ======================= -->
  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>

  <!-- Animations -->
  <script src="assets/js/animations.js"></script>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- ==================== END SCRIPTS ====================== -->

</body>

</html>