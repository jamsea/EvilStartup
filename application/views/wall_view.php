<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php $this->load->helper('url'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Evil Startup</title>
	<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css">
	
	<script type="text/javascript" language="javascript" src="<?php echo base_url("js/jquery-1.7.1.min.js"); ?>"></script>

	
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
	.rating {
		/*background: #f00;
		padding: 0px;
		text-align: center;
		border: 1px solid;
		-moz-border-radius: 15px;
		border-radius: 15px;*/
		
		padding: 0px;
		border-left: 0px;
	}
	
	.ratingNum {
		cursor: pointer;
		clear: none;
	}
	
	.table td {
		
	}
	
	.table-bordered th + th, .table-bordered td + td, .table-bordered th + td, .table-bordered td + th {
		border-left: 0px;
	}

	table {
		
	}
    </style>
</head>
<body>








<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container">
		<a class="brand"><img src="<?php echo base_url("img/logo.png");?>" ></a>
			<ul class="nav">
				<li>
					<a class="btn btn-warning btn-large" href="<?php echo base_url("wall/add");?>">Add a Startup</a>
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

			<table class="table table-striped table-bordered table-condensed">
			<tbody>
			
			<?php $this->load->helper('dob'); ?>
			<?php 
			foreach($all_startups as $row)
			 { ?>
			<tr>
				<td class="rating">
					<a class="btn">
						<div class="<?php echo $row->id ?>" onclick="vote(<?php echo $row->id ?>, $(this));" >
							<h2><?php echo $row->rating; ?></h2>
							<img class="ratingNum" src="/battle/img/arrow.png" />
							
						</div>
					</a>
				</td>
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
		</div>
	</div>
		
</div>

<script>
function vote(id, element)
{
	
	  var url = "<?php echo base_url("wall/vote/"); ?>" + "/" + id;
	  $.post(url, function(data) {
		element.parent(".btn").html("<h2>" + data + "</h2>" + "<img src='/battle/img/arrow.png' />");
   });
}
</script>



</body>
</html>