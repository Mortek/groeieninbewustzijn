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

if(isset($_POST['pdf_submit'])) 
{   
    if (empty($_POST['pdf_name']) || empty($_POST['pdf_email'])) {
        header('Location: https://www.intenceopleidingen.nl/?pdf=false&pdf_name='.$_POST['pdf_name'].'&pdf_email='.$_POST['pdf_email']);
    }
    else {
        # To Margo
        $name = $_POST['pdf_name'];
        $email = $_POST['pdf_email'];
        $headers = "Reply-to: $email";

        $to = 'info@intenceopleidingen.nl';
        $subject = 'Reactie op het gratis activiteiten formulier';


        $body = "Er is een nieuwe reactie op het gratis activiteiten formulier:

Naam: $name 
Email: $email 
";

        mail($to, $subject, $body, $headers);

        # To visitor
        $headers = "Reply-to: info@intenceopleidingen.nl" . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= "From: info@intenceopleidingen.nl" . "\r\n";
        $to = $_POST['pdf_email'];

        $subject = 'Intence opleidingen. Veel plezier met uw gratis activiteit!';


        $body = "Hoi $name, <br><br>

<b>Ego doorprikkers</b> <br>
Leuk dat je deze gratis ego doorprikkers hebt aangevraagd. Dat betekent, dat jij zelf de nodige stappen hebt gezet om te groeien in bewustzijn en te openen in Liefde. Waarschijnlijk voel jij nu het verlangen om anderen daarin te begeleiden.<br><br>

Deze lijst met ego doorprikkers is een onderdeel van de opleiding Transformatie Coachen.<br>
De opleiding leidt je op tot een bewustzijnscoach en je begeleidt processen bij jouw klanten om te groeien in bewustzijn en te openen in Liefde.<br><br>

Het ego doorzien is één van de onderdelen waar je tips en tools voor krijgt, tijdens de opleiding.<br>
Met deze download heb jij al een hele lijst met vragen/opmerkingen die je kunt maken om de ander bewust te maken van het ego-gedrag. Je vergroot bewustzijn van de werking van het ego en je geeft inzicht hoe je het ego waar kunt nemen, maar niet voor waar hoeft te nemen.<br><br>

<b>Meer informatie</b><br>
Mocht je vragen hebben, schroom niet om te bellen of te mailen.<br><br>

Mocht je interesse gewekt zijn voor de opleiding en wil je nog meer tips en ‘tools’ om bewustzijnscoach te worden? Klik dan op <a href='https://www.intenceopleidingen.nl/opleiding-transformatie-coachen/'>deze link</a>.<br><br>

Veel succes met jouw egodoorprikkers. <br><br>

<b>De gratis activiteit kun je downloaden door <a target='_blank' href='https://intenceopleidingen.nl/wp-content/uploads/ego_door_prikkers.pdf'>hier te klikken</a>.</b>
";

        mail($to, $subject, $body, $headers);

        header('Location: https://www.intenceopleidingen.nl/?pdf=true');
    }
}