<?

/************************
* Variables you can change
*************************/

$mailto = "herisson@cazaon.com.br, heloiza.ro@gmail.com";
$cc = "";
$bcc = "";
$subject = "Site : Consócio Imobiliário";
$vname = $_POST['name'];


/************************
* do not modify anything below unless you know PHP/HTML/XHTML
*************************/


$email = $_POST['email'];

function validateEmail($email)
{
   if(eregi('^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,4}(\.[a-zA-Z]{2,3})?(\.[a-zA-Z]{2,3})?$', $email))
	  return true;
   else
	  return false;
}


if((strlen($_POST['name']) < 1 ) || (strlen($email) < 1 ) || (strlen($_POST['telefone']) < 1 ) || validateEmail($email) == FALSE){
	$return .= 'Error:';
	$bkg = "#e9e9e9";
	if(strlen($_POST['name']) < 1 ){
		$return .= '<li>Enter name</li>';
	}

	if(strlen($email) < 1 ){
		$return .= '<li>Enter email</li>';
	}

	if(validateEmail($email) == FALSE) {
		$return .= '<li>Enter valid email</li>';
	}

	if(strlen($_POST['telefone']) < 1 ){
		$return .= '<li>Enter telefone</li>';
	}

} else {

	
	// NOW SEND THE ENQUIRY

	$timestamp = date("F j, Y, g:ia");

	$messageproper ="\n\n" .
		"Name: " .
		ucwords($_POST['name']) .
		"\n<br>" .
		"Email: " .
		ucwords($email) .
		"\n<br>" .
		"Telefone: <a href='tel:".$_POST['telefone']."'>" .
		$_POST['telefone'] .
		"</a>\n" .
		"\n\n" ;
		$headers = "Content-Type:text/html; charset=UTF-8\n";
		$headers .= "MIME-Version: 1.0\n";
		$messageproper = trim(stripslashes($messageproper));
		if(mail($mailto, $subject, $messageproper, "Content-Type:text/html; charset=UTF-8\n MIME-Version: 1.0\n From: \"$vname\" <".$_POST['email'].">\nReply-To: \"".ucwords($_POST['name'])."\" <".$_POST['email'].">\nX-Mailer: PHP/" . phpversion())){
			$return = '<div class="retorno">
			<h3>Sua solicitação foi enviada.<br>
			Em bre entraremos em contato.
			</h3>
			
			<span>Horário de atendimento das 10h as 17h.</span>
			';
			$bkg = "#00a096";
		}else{
			
			$return = '<div class="retorno">
			<h3>Desculpe-nos, houve um erro inesperado.<br>
			Tente novamente mais tarde.
			</h3>
			
			<span>Horário de atendimento das 10h as 17h.</span>
			';
			$bkg = "#a40505";
		}

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="favicon.ico" rel="Shortcut Icon">
<title>SICOOB</title>
<!-- IE Hack para HTML-->
<!-- [if lt IE 9]-->
<script type="html5shiv.js"></script>
<!-- [endif] -->

<link href="bootstrap/css/bootstrap.min.css?v=2" rel="stylesheet">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/style.css?v=1255">
<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script type="text/javascript">

      $(document).ready(function(){
         $window = $(window);
         $('section[data-type="background"]').each(function(){
           var $scroll = $(this);                 
            $(window).scroll(function() {
              var yPos = -($window.scrollTop() / $scroll.data('speed')); 
               var coords = '50% '+ yPos + 'px';
              $scroll.css({ backgroundPosition: coords });    
            });
         });  
      }); 
      </script>

</head>
<body style="background:<?php echo $bkg;?>;">
<header style="background:white; height: 80px;"> <a href="#" title="Logo Sicoob"> <img src="img/logo_sicoob.png" class="img-responsive " style="margin: 0;
padding: 15px;"> </a> </header>
<div class="container">
	<?php echo $return;?>
</div>
</body>
</html>

