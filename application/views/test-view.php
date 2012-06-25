<html>
	<head>
		<title>Testing CI</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		 <base href="<?php echo base_url() ?>" />
		
		<?php echo link_tag("application/external/jquery-ui/css/blitzer/jquery-ui-1.8.21.custom.css") ?>
		<script src="<?php echo base_url() ?>application/external/jquery-ui/js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url() ?>application/external/jquery-ui/js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
		<script type="text/javascript">			
			$(function(){
				$("form#form-test button#enviar").button({icons: { primary: "ui-icon-disk" } });					
				$("form#form-test input#birth").datepicker({ dateFormat: "yy-mm-dd" });
			})
		</script>
	</head>
	<body>
		<div id="container" style="width:500px;margin-left:auto;margin-right:auto;">
			<?php echo validation_errors('<div class="ui-state-error ui-corner-all" style="margin-bottom:2px;">', '</div>'); ?>
			<!--<form method="POST" action="<?php// echo site_url('test/recibeDatos')?>">!-->
			<?php echo form_open("test/recibeDatos", array("id"=>"form-test")) ?>
				<fieldset class="ui-state-default ui-corner-all">
					<legend class="ui-state-active ui-corner-all">Datos de Personas</legend>
						Name: <input id="name" name="name" type="text" size="30" class="ui-widget-content ui-corner-all" /><br />
						Email: <input id="email" name="email" type="text" size="30" class="ui-widget-content ui-corner-all" /><br />
						Date of birth: <input id="birth" name="birth" type="text" size="10" class="ui-widget-content ui-corner-all" />
						<br />
						<button id="enviar" type="submit">Enviar datos</button>
				</fieldset>
			</form> 
		</div>	
	</body>
</html>
