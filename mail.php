<?php

// ── Requires PHPMailer + vlucas/phpdotenv ──────────────────
// Install via Composer:
//   composer require phpmailer/phpmailer vlucas/phpdotenv

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require "vendor/autoload.php";

// ── Load .env ──────────────────────────────────────────────
// Place your .env file in the project root (same folder as vendor/)
// Make sure .env is NOT inside your public web root!
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// ── Helper: sanitize input ─────────────────────────────────
function sanitize(string $value): string {
  return htmlspecialchars(trim($value), ENT_QUOTES, "UTF-8");
}

// ── Only handle POST requests ──────────────────────────────
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: index.html");
  exit();
}

// ── CSRF check ─────────────────────────────────────────────
session_start();
if (
  empty($_POST["csrf_token"]) ||
  !hash_equals($_SESSION["csrf_token"] ?? "", $_POST["csrf_token"])
) {
  http_response_code(403);
  exit("Ogiltig förfrågan.");
}

// ── Honeypot check (bots fill hidden fields, humans don't) ─
if (!empty($_POST["website"])) {
  // Pretend it worked so bots don't retry
  header("Location: thank-you.html");
  exit();
}

// ── Collect & validate input ───────────────────────────────
$name    = sanitize($_POST["name"] ?? "");
$email   = sanitize($_POST["email"] ?? "");
$company = sanitize($_POST["company"] ?? "");
$message = sanitize($_POST["message"] ?? "");

$typeMap = [
  "new-site" => "Ny hemsida",
  "changes"  => "Ändringar på befintlig hemsida",
  "support"  => "Löpande support",
  "unsure"   => "Jag är osäker – hjälp mig välja",
];
$typeRaw = sanitize($_POST["type"] ?? "");
$type    = $typeMap[$typeRaw] ?? $typeRaw;

if (empty($name) || empty($email) || empty($message)) {
  header("Location: index.html?error=missing_fields");
  exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header("Location: index.html?error=invalid_email");
  exit();
}

// ── Meta info ──────────────────────────────────────────────
$timestamp   = date("Y-m-d H:i:s");
$senderIp    = $_SERVER["REMOTE_ADDR"] ?? "okänd";
$messageFmt  = nl2br($message);

// ── Send mail ──────────────────────────────────────────────
$mail = new PHPMailer(true);

try {

  // SMTP
  $mail->isSMTP();
  $mail->Host       = $_ENV["MAIL_HOST"];
  $mail->SMTPAuth   = true;
  $mail->Username   = $_ENV["MAIL_USERNAME"];
  $mail->Password   = $_ENV["MAIL_PASSWORD"];
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port       = (int) $_ENV["MAIL_PORT"];
  $mail->CharSet    = "UTF-8";

  // From / To
  $mail->setFrom($_ENV["MAIL_FROM_ADDRESS"], $_ENV["MAIL_FROM_NAME"]);
  $mail->addAddress($_ENV["MAIL_TO_ADDRESS"], $_ENV["MAIL_TO_NAME"]);
  $mail->addReplyTo($email, $name);

  // Content
  $mail->isHTML(true);
  $mail->Subject = "Nytt meddelande från wabira.se";
  $mail->Body    = getEmailBody($name, $email, $company, $type, $messageFmt, $timestamp, $senderIp);
  $mail->AltBody = getPlainTextBody($name, $email, $company, $type, $message, $timestamp, $senderIp);

  $mail->send();
  header("Location: thank-you.html");
  exit();

} catch (Exception $e) {
  error_log("[wabira mailer] " . $mail->ErrorInfo);
  header("Location: index.html?error=mail_failed");
  exit();
}


// ── HTML email template ────────────────────────────────────
function getEmailBody(
  string $name,
  string $email,
  string $company,
  string $type,
  string $message,
  string $timestamp,
  string $ip
): string {
  return '
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin:0; padding:0; background-color:#F0ECE6; font-family:Arial,sans-serif;">

  <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#F0ECE6; padding:40px 20px;">
    <tr>
      <td align="center">
        <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px; width:100%;">

          <!-- Header -->
          <tr>
            <td style="background-color:#22333B; padding:28px 36px; border-radius:8px 8px 0 0;">
              <p style="margin:0; font-size:22px; font-weight:700; color:#FAFAF9; letter-spacing:2px;">WABIRA</p>
              <p style="margin:4px 0 0; font-size:12px; color:#B39A84; letter-spacing:1px; text-transform:uppercase;">Webbutveckling</p>
              <p style="margin:6px 0 0; font-size:12px; color:#7A8E96;">wabira.se</p>
            </td>
          </tr>

          <!-- Accent bar -->
          <tr>
            <td style="background-color:#B39A84; height:4px; font-size:0; line-height:0;">&nbsp;</td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="background-color:#FAFAF9; padding:36px 36px 20px;">

              <p style="margin:0 0 24px; font-size:13px; font-weight:700; color:#B39A84; letter-spacing:1px; text-transform:uppercase;">Nytt meddelande från wabira.se</p>

              <!-- Sender info box -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                <tr>
                  <td style="background-color:#EBE7E1; border-left:4px solid #B39A84; padding:16px 20px; border-radius:0 4px 4px 0;">
                    <table width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="padding-bottom:10px;">
                          <span style="font-size:11px; color:#5E503F; font-weight:700; letter-spacing:1px; text-transform:uppercase;">Namn</span><br>
                          <span style="font-size:15px; color:#22333B;">' . $name . '</span>
                        </td>
                      </tr>
                      ' . ($company ? '<tr><td style="padding-bottom:10px;"><span style="font-size:11px; color:#5E503F; font-weight:700; letter-spacing:1px; text-transform:uppercase;">Företag</span><br><span style="font-size:15px; color:#22333B;">' . $company . '</span></td></tr>' : '') . '
                      <tr>
                        <td style="padding-bottom:10px;">
                          <span style="font-size:11px; color:#5E503F; font-weight:700; letter-spacing:1px; text-transform:uppercase;">E-post</span><br>
                          <span style="font-size:15px; color:#22333B;">' . $email . '</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span style="font-size:11px; color:#5E503F; font-weight:700; letter-spacing:1px; text-transform:uppercase;">Vad behöver de?</span><br>
                          <span style="font-size:15px; color:#22333B;">' . $type . '</span>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

              <!-- Divider -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:24px;">
                <tr>
                  <td style="border-top:1px solid #DDD8D2; font-size:0; line-height:0;">&nbsp;</td>
                </tr>
              </table>

              <!-- Message -->
              <p style="margin:0 0 10px; font-size:11px; color:#5E503F; font-weight:700; letter-spacing:1px; text-transform:uppercase;">Meddelande</p>
              <div style="font-size:15px; color:#2E2A25; line-height:1.7; padding:20px; background-color:#F7F4F0; border-radius:4px; border:1px solid #DDD8D2;">' . $message . '</div>

            </td>
          </tr>


          <!-- Meta info -->
          <tr>
            <td style="background-color:#F7F4F0; padding:14px 36px; border-top:1px solid #DDD8D2;">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="font-size:11px; color:#9A9188;">
                    <strong style="color:#7A7069;">Skickat:</strong> ' . $timestamp . '
                  </td>
                  <td style="font-size:11px; color:#9A9188; text-align:right;">
                    <strong style="color:#7A7069;">IP:</strong> ' . $ip . '
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="background-color:#EBE7E1; padding:18px 36px; border-radius:0 0 8px 8px; border-top:1px solid #D8D2CA;">
              <p style="margin:0; font-size:12px; color:#5E503F; text-align:center;">
                Det här mailet skickades från kontaktformuläret på
                <a href="https://wabira.se" style="color:#5E503F;">wabira.se</a>
              </p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

</body>
</html>
';
}

// ── Plain-text fallback ────────────────────────────────────
function getPlainTextBody(
  string $name,
  string $email,
  string $company,
  string $type,
  string $message,
  string $timestamp,
  string $ip
): string {
  $companyLine = $company ? "Företag: $company\n" : "";
  return "Nytt meddelande från wabira.se\n"
    . "================================\n\n"
    . "Namn:    $name\n"
    . $companyLine
    . "E-post:  $email\n"
    . "Behov:   $type\n\n"
    . "Meddelande:\n$message\n\n"
    . "--------------------------------\n"
    . "Skickat: $timestamp\n"
    . "IP:      $ip\n"
    . "Källa:   https://wabira.se\n";
}