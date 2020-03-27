<?php
  require 'vendor/autoload.php'; // If you're using Composer (recommended)

  $email = new \SendGrid\Mail\Mail();
  $email->setFrom($_POST["sendgridEmail"], "Utente iscritto");
  $email->setSubject("Iscrizione newsletter utente landing page");
  $email->addTo("c.dettori@insurance-arena.com", "c.dettori");
  $email->addContent("text/plain", "Un utente si è iscritto alla nostra newsletter dalla landing page");
  $email->addContent(
      "text/html", "<strog>Un utente si è iscritto alla nostra newsletter dalla landing page</strong>"
  );
  $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
  try {
      $response = $sendgrid->send($email);
      header("Location: /index.html");
      exit();
  } catch (Exception $e) {
      echo 'Caught exception: '. $e->getMessage() ."\n";
  }
?>
