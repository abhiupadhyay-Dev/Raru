  <?php
if(isset($_POST['submit'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "info@rarucapital.com";
     
    $email_subject = "Website Inquiry form submissions";
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted.";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br/><br/>";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['company_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
  $company_name = $_POST['company_name']; // required
  $email_from = $_POST['email']; // required
  $telephone = $_POST['telephone']; // not required
     
  $error_message = "";
  $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

  $phone_exp = '/^[6-9]\d{9}$/';
  if(!preg_match($phone_exp,$telephone)) {
  $error_message .= 'The Phone number you entered does not appear to be valid.<br />';
  }
  
  $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$company_name)) {
    $error_message .= 'The Company Name you entered does not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
  $email_message .= "Company Name: ".clean_string($company_name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Telephone: ".clean_string($telephone)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<?php
echo"<script>alert('Thank you for contacting us. Download PDF Now');</script>";
echo "<script>window.location='RARU capital.pdf';</script>";
}
die();
?>