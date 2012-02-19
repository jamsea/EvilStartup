<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Evil Startup</title>
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
	<script type="text/javascript" language="javascript" src="/js/jquery-1.7.1.min.js"></script>

	<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript">
		// addstartup handler

		  $(document).ready(function() {
		 


		});
	

	</script>
	<style type="text/css">
	body {
		background:#ff9a1e;
		padding-top: 60px;
		padding-bottom: 40px;
	}
    </style>
</head>
<body>








<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container">
		<a class="brand" href="#"><img src="/img/logo.png"></a>
			<ul class="nav">
				<li>
					<a class="btn btn-warning btn-large" href="add">Add a Startup</a>
				</li>
		</ul>
	</div>
  </div>
</div>

<div class="container">

	<div class="row">
	

		<div class="span12 well">

		<div class="hero-unit">
		<h1>Instantly access the worlds best (most evil) startups.</h1>
		<p>Muahhahaha.</p>
		<p>

		</p>
		</div>

			
			<p>

			<table class="table table-bordered table-striped">
			<tbody>
			<tr>
			</tr>
			<?php $this->load->helper('dob'); ?>
			<?php 
			foreach($all_startups as $row)
			 { ?>
			<tr>
			<td><a class="<?php echo $row->id ?>" onclick="vote(<?php echo $row->id ?>, $(this));" href="#"><img src="/img/arrow.png" /><?php echo $row->rating; ?></a></td>
			<td>
			<h5><?php echo $row->name ?></h5>
			<?php if ($row->active){ ?>
				
			<?php } ?>
			<?php echo $row->desc ?>
			<h6>LOCATED IN  <span class="label label-warning"><?php echo $row->location ?></span>

			<?php if ($row->funded){ ?>
			FUNDED BY </6><span class="label label-default"><?php echo $row->fundedby ?></span>
			<?php }else{ ?>
			<span class="label label-important">NOT FUNDED</span>
			<?php } ?></6>
			
			<!--<h6><?php echo format_date($row->created) ?></h6>-->
			
			</td>
			</tr>
			<?php } ?></tbody>
			</table>



			</p>

			<p>

			</p>
		</div>
	</div>
		
</div>

<script>
function vote(id, element)
{
	  var url = "http://localhost/wall/vote/" + id;
	  $.post(url, function(data) {
		element.html("<img src='/img/arrow.png' />" + data);
   });
}
</script>



</body>
</html>