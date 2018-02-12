<html>

<head>
  <title>Kitchen Inventory</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



     <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <link rel="stylesheet" tyspe="text/css" href="<?php echo base_url().'css/style1.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/bootstrap.min.css';?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
    
   <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}
body {
    


} 
.panel{
    background-color: rgba(245, 245, 245, 0.4); ;
    border: 1px #222;
}
    .modal-header-primary {
    	color:#fff;
        padding:9px 15px;
        border-bottom:1px solid #eee;
        background-color: #428bca;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
         border-top-left-radius: 5px;
         border-top-right-radius: 5px;
    }

    .modal-footer-primary {

        padding:9px 15px;
        border-bottom:1px solid #eee;

        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
         border-top-left-radius: 5px;
         border-top-right-radius: 5px;
    }
   </style>
</head>

<body>
     <video autoplay loop id="video-background" muted plays-inline>
	  <source src="<?php echo base_url().'css/images/backgorundVideo.mp4?s=8e8741dbee251d5c35a759718d4b0976fbf38b6f&profile_id=119&oauth2_token_id=57447761';?>" type="video/mp4">
	</video>
    <div class="panel panel-success col-md-10 col-md-offset-1">
      

      <div class="panel-body">

		<nav class="navbar navbar-inverse">

			<div class="container-fluid">

				<ul class="nav navbar-nav">
				  <li><a href="<?php echo base_url().'user'?>">Home</a></li>
				  <li class="active"><a href="<?php echo base_url().'Liquor'?>">Liquor Inventory</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
      			   <li><a href="<?php echo base_url().'main/logout'?>">Log out</a></li>
    	        </ul>
			</div>
		</nav>
		
		<div class="panel panel-primary">
		<div class="panel-heading">Daily Usage Regarding to Liquor Stock Items</div>
		<!--div class="panel-body" style="height:250; overflow-y: scroll;"-->
		<div class="panel-body">

			<div class="table">
			  <table class="table">
				<thead>
				  <tr>
                    <th>Item Code</th>
					<th>Name</th>
					<th>Half pint</th>
					<th>Pint</th>
					<th>Fifth</th>
					<th>Litre</th>
				  </tr>
				</thead>
				<tbody>
          <?php

            if((sizeof($filter))>0)
            {
              foreach ($filter as $info)
              {
                ?>
                <tr>
                  <td><?php echo $info->item_code;?></td>
                   <td><?php echo $info->item_name;?></td>
                   <td><?php echo $info->half_pint;?></td>
                   <td><?php echo $info->pint;?></td>
                   <td><?php echo $info->fifth;?></td>
                   <td><?php echo $info->litre;?></td>
                <?php
              }
            }
            else
            {
              ?> <tr><td colspan='3'>Data Not Found</td></tr>
          <?php  }

          ?>
				</tbody>
			  </table>
			</div>
		</div>
		</div>
		</div>
		
    </div>
</body>
</html>
		
	
