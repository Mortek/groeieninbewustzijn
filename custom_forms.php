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

<b>De gratis activiteit kun je downloaden door <a target='_blank' href='https://intenceopleidingen.nl/wp-content/uploads/2017/gratis_activiteit.pdf'>hier te klikken</a>.</b> <br><br>

<b>Effect van de activiteit</b> <br>
Deze activiteit gebruik ik ook bij mijn clienten in mijn eigen praktijk en daar behalen we altijd goede resultaten mee. <br><br>

Door (ongewenst) gevoel om te zetten in een positief beeld verschuift de focus van een negatieve ervaring of een negatief gevoel naar een positieve toekomst. In deze activiteit heel concreet verbeeldt in klei. De client neemt het werkstuk mee naar huis en het mag de client daar weer herinneren aan een positieve toekomst. <br><br>

Bij kinderen geeft het vaak ook inzicht in de gedachtengang die ze vaak nog lastig kunnen verwoorden. Op die manier geeft het werkstuk hen niet alleen houvast, maar verschaft hij de ouders en mij ook enorm veel waardevolle informatie. <br><br>

<b>Verlatingsangst</b> <br>
Een meisje van 11 kleide zichzelf, haar zusje en haar moeder. Toen ze klaar <img src='https://intenceopleidingen.nl/wp-content/uploads/2017/pdf_image.png' /> was, maakte ze van de klei één grote pannenkoek. 'Zo die komen nooit meer van elkaar', zei het meisje. Hiermee uitte ze haar scheidingsangst zien. Hier hebben we verder mee gewerkt. <br><br>

<b>Meer informatie</b> <br>
Wanneer je vragen hebt, dan mag dat altijd. Gewoon door dit mailtje te beantwoorden. <br><br>

<b>Verder ontwikkelen</b> <br>
Wanneer je interesse hebt in deze methodiek en je er meer over wilt weten, dan ben je van harte welkom om <a target='_blank' href='https://www.intenceopleidingen.nl/creatieve-opleidingen/korte-creatieve-therapie-opleiding/'>hier verder te kijken</a>.  <br><br>

Met vriendelijke groet, <br><br>

Margo Riphagen
";

        mail($to, $subject, $body, $headers);

        header('Location: https://www.intenceopleidingen.nl/?pdf=true');
    }
}