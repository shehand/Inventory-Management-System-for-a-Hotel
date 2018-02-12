<html>

<head>
  <title>Bar Inventory</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="css/registration-form-with-bootstarp.css">
   <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 


   <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
   
   
   
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <link rel="stylesheet" tyspe="text/css" href="<?php echo base_url().'css/style1.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/bootstrap.min.css';?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
   <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}

.body {
    


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

            <div class="panel-body" img src="inventory.png">
	        <div class="row">
	        <div class="col-md-10"></div>

		<nav class="navbar navbar-inverse">

			<div class="container-fluid">


				<ul class="nav navbar-nav">
				    <li><a href="<?php echo base_url().'user'?>">Home</a></li>
				  <li><a href="<?php echo base_url().'Hotel'?>">Hotel Inventory</a></li>	
        		<li><a href="<?php echo base_url().'Kitchen'?>">Kitchen Inventory</a></li>
        		<li class="active"><a href="<?php echo base_url().'Main_bar'?>">Resturant Inventory</a></li>
				</ul>

                <ul class="nav navbar-nav navbar-right">
      			<li><a href="<?php echo base_url().'main/logout'?>">Log out</a></li>
    	</ul>
			</div>
		</nav>
    <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" a href="<?php echo base_url().'Liquor'?>">Liquor</a>
    <br>
    
    <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" a href="<?php echo base_url().'Beer'?>">Beer Can</a>
    <br>
    
    <a <button type="button"  class="btn btn-primary btn-lg btn-block" data-toggle="modal" a href="<?php echo base_url().'Soft_drink'?>">Soft Drinks</a>
    <br>
     <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" a href="<?php echo base_url().'Cigaratte'?>">Cigaratte</a>
     <br>
      <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" a href="<?php echo base_url().'Inventory_list'?>">Inventory</a>
       <br>
      <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" a href="<?php echo base_url().'Main_bar/delete'?>">Empty Tables</a>
    

<!--  	<a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" href="<?php echo base_url().'Main_bar/delete'?>">Delete</a>
      <br>
       <br>
     <br>
  <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" href="<?php echo base_url().'Main_bar/newday'?>">New Day</a>
    <br>
  <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" href="<?php echo base_url().'Main_bar/newmonth'?>">New Month</a>
<br>-->

  </body>

</html>
