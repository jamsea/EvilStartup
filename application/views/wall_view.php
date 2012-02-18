<!DOCTYPE html>
<html lang="en">
<head>
	<title>Day Care</title>
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript">
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
		<a class="brand" href="#">EvilStartup</a>
			<ul class="nav">
			<li><a href="#">Home</a></li>

		</ul>
	</div>
  </div>
</div>

<div class="container">

	<div class="row">
		<div class="span3">
			<ul class="nav nav-list well">
				<li class="nav-header">
					Menu
				</li>
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Charts</a>
				</li>
			</ul>
		</div>

		<div class="span8 well">

			<p>Hello, Jakub Koter</p>
			
			<p>

			<table class="table table-bordered table-striped">
			<tbody>
			<tr>
			<td>Message</td>
			</tr>
			<?php $this->load->helper('dob'); ?>
			<?php 
			foreach($all_startups as $row)
			 { ?>
			<tr>
			<td>
			<?php echo $row->name ?>
			<?php if ($row->active){ ?>
				
			<?php } ?>
			<h5><?php echo $row->desc ?></h5>
			<h6>LOCATED IN  </6><span class="label label-warning"><?php echo $row->location ?></span>

			<?php if ($row->funded){ ?>
			<h6>FUNDED BY </6><span class="label label-warning"><?php echo $row->fundedby ?></span>
			<?php }else{ ?>
			<span class="label label-important">NOT FUNDED</span>
			<?php } ?>
			
			<!--<h6><?php echo format_date($row->created) ?></h6>-->
			<a href="vote/<?php echo $row->id;?>" class="btn btn-success" href="#">VOTE:</a>
			</td>
			</tr>
			<?php } ?></tbody>
			</table>

			</p>
			<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
		</div>
	</div>
		
</div>
</body>
</html>