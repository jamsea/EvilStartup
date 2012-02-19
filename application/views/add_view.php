<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Evil Startup</title>
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
	<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

	<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript">
		// addstartup handler

		$("#form_row_fundedby").hide(1000);

		  $(document).ready(function() {

		  	$("#form_row_fundedby").hide();


		 $("#funded").click(function () {
			if ($('#funded:checked').val() !== undefined) {
			//otherInput is the hidden text input
			$("#form_row_fundedby").slideDown('fast');
			} else {
			$("#form_row_fundedby").slideUp('fast');
			}
		}); 

				 		// addstartup handler
			$("#addstartup").submit(function() {
				// add CSRF token
				$('#submit').before('<input type="hidden" name="ci_csrf_token" value="'+$.cookie("ci_csrf_token")+'" />');
				$.post("wall/add", $('#addstartup').serialize(), function(data) {
						$("#name_error").html(data.name);
						$("#desc_error").html(data.desc);
						$("#location_error").html(data.location);
						$("#funded_error").html(data.funded);
						$("#fundedby_error").html(data.fundedby);
						$("#pic_error").html(data.pic);
						if (data.form_message) {
							$('#addstartup').html(data.form_message);
						}
					},'json'
				);
				return false;
			});


		});
	

	</script>
	<style type="text/css">
	body {
		padding-top: 60px;
		padding-bottom: 40px;
	}
    </style>
</head>
<body>








<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container">
		<a class="brand" href="wall"><img src="/battle/img/logo.png"></a>
			<ul class="nav">

		</ul>
	</div>
  </div>
</div>

<div class="container">

	<div class="row">
	
		<div class="span12 well">


		<h1>Add your startup to Evil list!</h1>
			<p>
			<?php if($content){ ?>
			<div class="alert alert-success">
			<?php print_r($content); ?>
			</div>
			<?php } ?>


<?php echo form_open('wall/add', array('id' => 'addstartup')); ?>
<div class="form_row">
	<span class="form_label"><label for="name">Startup Name</label></span>
	<span class="form_input">
		<input type="text" value="<?php if (isset($name)) { echo $name; } ?>" name="name" id="name" placeholder="Startup Name" size="50"  />	</span>
	<span class="form_error" id="name_error">
<?php if (isset($error['name'])) { echo $error['name']; } ?></span>
</div>
<div class="form_row">
	<span class="form_label"><label for="desc">Description</label></span>
	<span class="form_input">
		<textarea name="desc" id="desc" ><?php if (isset($desc)) { echo $desc; } ?></textarea>	</span>
	<span class="form_error" id="desc_error">
<?php if (isset($error['desc'])) { echo $error['desc']; } ?></span>
</div>
<div class="form_row">
	<span class="form_label"><label for="location">Where you at?</label></span>
	<span class="form_input">
		<input type="text" value="<?php if (isset($location)) { echo $location; } ?>" name="location" id="location" placeholder="Where you at?" size="50"  />	</span>
	<span class="form_error" id="location_error">
<?php if (isset($error['location'])) { echo $error['location']; } ?></span>
</div>
<div class="form_row">
	<span class="form_label"><label for="funded">Are you funded?</label></span>
	<span class="form_input">
		<input type="checkbox" value="<?php if (isset($funded)) { echo $funded; } else { echo "0"; } ?>" name="funded" id="funded" />	</span>
	<span class="form_error" id="funded_error">
<?php if (isset($error['funded'])) { echo $error['funded']; } ?></span>
</div>
<div class="form_row" id="form_row_fundedby">
	<span class="form_label"><label for="fundedby">I am funded by: </label></span>
	<span class="form_input">
		<input type="text" value="<?php if (isset($fundedby)) { echo $fundedby; } ?>" name="fundedby" id="fundedby" placeholder="Who's funding you?" size="50"  />	</span>
	<span class="form_error" id="fundedby_error">
<?php if (isset($error['fundedby'])) { echo $error['fundedby']; } ?></span>
</div>

<div class="button_row" style="padding-top:20px;"><button class="btn btn-large btn-primary" type="submit" id="submit">Add</button></div>
</form>


			</p>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>
	</div>
		
</div>
</body>
</html>