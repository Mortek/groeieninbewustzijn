<?php
if(isset($_POST['newsletter_submit'])) 
{ 
    if (empty($_POST['email']) || $_POST['email'] === "Vul uw e-mailadres in...") {
        //$form_message = 'Het ingevulde e-mailadres is onjuist';
    }
    else {
        $email = $_POST['email'];
        $to = 'info@intenceopleidingen.nl';
        $subject = 'Inschrijving op de nieuwsbrief';
        $body = "Er is een nieuwe aanmelding op de nieuwsbrief van intenceopleidingen: $email";
        $headers = "Reply-to: $email";

        $form_message = 'U heeft zich ingeschreven op de nieuwsbrief!';

        mail($to, $subject, $body, $headers);
        header('Location: https://www.intenceopleidingen.nl?newsletter=true');
    }
}


if(isset($_POST['contact_submit'])) 
{ 
    if (empty($_POST['name']) && empty($_POST['email']) && empty($_POST['message'])) {
        //$form_message = 'Vul alle verplichten velden in a.u.b.';
    }
    else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $headers = "Reply-to: $email";

        $to = 'info@intenceopleidingen.nl';

        if ($_POST['subject']) {
            $subject = $_POST['subject'];
        }
        else {
            $subject = 'Reactie op het contactformulier';
        }

        $body = "Er is een nieuwe reactie op het contactformulier:

                Naam: $name 
                Onderwerp: $subject 
                Email: $email 
                Bericht:
                $message
                ";

        $form_message = 'Bedankt voor uw bericht. Ik zal zo spoedig mogelijk contact met u opnemen.';

        mail($to, $subject, $body, $headers);
        header('Location: https://www.intenceopleidingen.nl/contact?submitted=true');
    }
    
}