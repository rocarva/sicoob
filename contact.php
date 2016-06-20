<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript">

	$(document).ready(function() {
		$('#submitform').ajaxForm({
			target: '#error',
			success: function() {
			$('#error').fadeIn('slow');
			}
		});
	});

</script>
</head>
<body>

<div id="contactform">
<div id="formleft">
	<form id="submitform" action="submitemail.php" method="post" >
		<fieldset>
			<label class="btntext"> Nome </label> 
			<input  class="form-control" type="text" name="name" />
		</fieldset>

		<fieldset>
			<label for="telefone" class="btntext">Telefone</label>
            <input class="form-control" type="tel" id="telefone" name="telefone">
            <em>(xx) xxxx-xxxx</em>
		</fieldset>

		<fieldset>
			<label  class="btntext">Email: </label>
			<input class="form-control" type="text" name="email" />
		</fieldset>



		<fieldset>
			<input style="font-size: large" type="submit" class="button btncontact btn btn-warning center-block " value="Enviar" />
		</fieldset>
	</form>
	<br />
		<div class="row center-block">
		<div class=" col-md-1">
			<img src="img/info_seguranca.png" alt="" />
		</div>
			<div class=" col-md-9 infosegura">
				<p>Suas informações estão seguras.</p>
			</div>
		</div>
    </div>
	<div id="error">

	</div>
<div class="clear"></div>
</div>
</body>
</html>