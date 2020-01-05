<?php
// Check for empty fields
// check if fields passed are empty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['name'])  		||
       empty($_POST['email']) 		||
       empty($_POST['message'])	||
       !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
       {
    	echo "No arguments Provided!";
    	return false;
       }

       $name = $_POST['name'];
       $email_address = $_POST['email'];
       $phone = $_POST['phone']
       $message = $_POST['message'];


    // Create the email and send the message
    $to = 'guptaa.ankitt@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    $email_subject = "Website Contact Form:  $name";
    $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: noreply@aaygupta.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    $headers .= "Reply-To: $email_address";

    if (mail($to,$email_subject,$email_body,$headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your message has been sent.";
            return true;
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong and we couldn't send your message.";
            return false;
        }

}
else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
        return false;
    }
?>
