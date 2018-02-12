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
				<li><a href="<?php echo base_url().'#'?>">Payroll Management</a></li>
				</ul>

			<ul class="nav navbar-nav navbar-right">
      			<li><a href="<?php echo base_url().'main/logout'?>">Log out</a></li>
    	</ul>
			</div>
		</nav>

    <nav class="navbar navbar-inverse">

        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo base_url().'Liquor'?>">Liquor</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url().'Beer'?>">Beer Can</a></li>
          </ul>

				<ul class="nav navbar-nav">
				  <li><a href="<?php echo base_url().'Soft_drink'?>">Soft Drinks</a></li>
				</ul>

        <ul class="nav navbar-nav">
				  <li><a href="<?php echo base_url().'Cigaratte'?>">Cigaratte</a></li>
				</ul>

        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url().'Inventory_list'?>">Inventory</a></li>
        </ul>

		</nav>


		<a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addDataToStock">New Stocks</a>
    <br>
    <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#stockintake">Stock In</a>
    <br>
	  <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#updateDailyConsumptions">Stock OUT</a>
    <br>
		<a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#updatePrice">Update Price</a>
    <br>
		<div class="panel panel-primary" >
		<div class="panel-heading"><center>Available Stock</center></div>
		<div class="panel-body" style="height:500; overflow-y: scroll;">
		<div class="panel-body">

			<div class="table">
			  <table class="table">
				<thead>
				  <tr>
            <th>Item Code</th>
  					<th>Name</th>
  					<th>Quantity</th>
            <th>Original Price</th>
            <th>Selling Price</th>
            <th>Profit</th>
            <th>Last Updated Date</th>

				  </tr>
				</thead>
				<tbody>
          <?php
            if((sizeof($availab))>0)
             {
               foreach ($availab as $info)
               {
                 ?>
                 <tr>
                   <td><?php echo $info->product_code;?></td>
                   <td><?php echo $info->product_name;?></td>
                   <td><?php echo $info->qty;?></td>
                   <td><?php echo $info->o_price;?></td>
                   <td><?php echo $info->price;?></td>
                   <td><?php echo $info->profit;?></td>
                   <td><?php echo $info->date_arrival;?></td>
                 <?php
                  }
             }
             else
             {
               ?> <tr><td colspan='3'>Empty Stock</td></tr>
           <?php  }

           ?>
				</tbody>
			  </table>
			</div>
		</div>
		</div>
  </div>


<!--modals-->
    <div class="modal fade" id="addDataToStock" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Item to Stock</h4>
        </div>
      <!--asdfsadf-->
	  <p></p>
      <form method="post" action="Liquor_Stock/New_Stock_form_validation">
				<div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Item Code: </span>
				  <input type="text" class="form-control" style="width: 98%;" name="product_code" placeholder="Insert product code">


				</div>
				<br>

        <div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Item Name: </span>
				  <input type="text" class="form-control" style="width: 98%;" name="product_name" placeholder="Insert product name">


				</div>
				<br>

        <div class="input-group" style="width: 100%;">
          <span class="input-group-addon" style="width: 20%;">Quantity</span>
          <input type="text" class="form-control" style="width: 98%;" name="qty" placeholder="Quantity of bottles">
        </div>
        <br>
        <div class="input-group" style="width: 100%;">
          <span class="input-group-addon" style="width: 20%;">Original Price</span>
          <input type="text" class="form-control" style="width: 98%;" name="o_price" placeholder="Original Price of an unit">
        </div>
        <br>
        <div class="input-group" style="width: 100%;">
          <span class="input-group-addon" style="width: 20%;">Selling Price</span>
          <input type="text" class="form-control" style="width: 98%;" name="price" placeholder="Original Price of an unit">
        </div>
        <br>
        <div class="bootstrap-iso">

			 <div class="container-fluid">
				<div class="row">
					<div>
						<div class="form-group ">

						  <div >
						   <div class="input-group" style="width: 100%;">
							<span class="input-group-addon" style="width: 20%;">Date: </span>
							<input class="form-control" style="width: 98%;" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>

						 </div>
					</div>
				</div>
			 </div>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

		<script>
			$(document).ready(function(){
				var date_input=$('input[name="date"]'); //our date input has the name "date"
				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
				date_input.datepicker({
					format: 'yyyy-mm-dd',
					container: container,
					todayHighlight: true,
					autoclose: true,
				})
			})
		</script>

			 </form>
      <!--asdfsadf-->
        <div class="modal-footer modal-footer-primary">
          <input type="submit" name="submit_product" value="Submit" class="btn btn-primary">
        </div>
      </div>
	 </div>
	</div>
    </div>
  </div>



  <div class="modal fade" id="stockintake" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Stock Intake</h4>
        </div>
      <!--asdfsadf-->
	  <p></p>
      <form method="post" action="Liquor_Stock/Stock_in_form_validation">
				<div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Item Code: </span>
				  <input type="text" class="form-control" style="width: 98%;" name="product_code" placeholder="Insert product code">


				</div>

        <br>

        <div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Item Name: </span>
				  <input type="text" class="form-control" style="width: 98%;" name="product_name" placeholder="Insert product name">


				</div>
				<br>
        <div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Quantity - Half Pint</span>
				  <input type="text" class="form-control" style="width: 98%;" name="half_pint" placeholder="Quantity of Half Pint bottles">


				</div>
				<br>
        <div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Quantity - Quantity</span>
				  <input type="text" class="form-control" style="width: 98%;" name="qty" placeholder="Quantity of Quantity Quantity bottles">


				</div>
				<br>
        <div class="bootstrap-iso">

			 <div class="container-fluid">
				<div class="row">
					<div>
						<div class="form-group ">

						  <div >
						   <div class="input-group" style="width: 100%;">
							<span class="input-group-addon" style="width: 20%;">Date: </span>
							<input class="form-control" style="width: 98%;" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>

						 </div>
					</div>
				</div>
			 </div>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

		<script>
			$(document).ready(function(){
				var date_input=$('input[name="date"]'); //our date input has the name "date"
				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
				date_input.datepicker({
					format: 'yyyy-mm-dd',
					container: container,
					todayHighlight: true,
					autoclose: true,
				})
			})
		</script>

			 </form>
      <!--asdfsadf-->
        <div class="modal-footer modal-footer-primary">
          <input type="submit" name="submit_product" value="Submit" class="btn btn-primary">
        </div>
      </div>
	 </div>
	</div>
    </div>
  </div>


  <div class="modal fade" id="updatePrice" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Price</h4>
        </div>
      <!--asdfsadf-->
    <p></p>
      <form method="post" action="Liquor_Stock/updatePrice">
        <div class="input-group" style="width: 100%;">

          <span class="input-group-addon" style="width: 20%;">Item Code: </span>
          <input type="text" class="form-control" style="width: 98%;" name="product_code" placeholder="Insert product code">


        </div>

        <br>

        <div class="input-group" style="width: 100%;">

          <span class="input-group-addon" style="width: 20%;">Item Name: </span>
          <input type="text" class="form-control" style="width: 98%;" name="product_name" placeholder="Insert product name">


        </div>
        <br>
        <div class="input-group" style="width: 100%;">
          <span class="input-group-addon" style="width: 20%;">Original Price</span>
          <input type="text" class="form-control" style="width: 98%;" name="o_price" placeholder="Original Price of an unit">
        </div>
        <br>
        <div class="input-group" style="width: 100%;">
          <span class="input-group-addon" style="width: 20%;">Selling Price</span>
          <input type="text" class="form-control" style="width: 98%;" name="price" placeholder="Original Price of an unit">
        </div>

        <br>
        <div class="bootstrap-iso">

       <div class="container-fluid">
        <div class="row">
          <div>
            <div class="form-group ">

              <div >
               <div class="input-group" style="width: 100%;">
              <span class="input-group-addon" style="width: 20%;">Date: </span>
              <input class="form-control" style="width: 98%;" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>

             </div>
          </div>
        </div>
       </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

    <script>
      $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
          format: 'yyyy-mm-dd',
          container: container,
          todayHighlight: true,
          autoclose: true,
        })
      })
    </script>

       </form>
      <!--asdfsadf-->
        <div class="modal-footer modal-footer-primary">
          <input type="submit" name="submit_product" value="Submit" class="btn btn-primary">
        </div>
      </div>
   </div>
  </div>
    </div>
  </div>


    <div class="modal fade" id="updateDailyConsumptions" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Stock Outtake</h4>
        </div>
		<p></p>
      <!--asdfsadf-->
      <form method="post" action="Liquor_Stock/Stock_out_form_validation">
				<div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Item Code: </span>
				  <input type="text" class="form-control" style="width: 98%;" name="product_code" placeholder="Insert product code">

				</div>
				<br>
        <div class="input-group" style="width: 100%;">

				  <span class="input-group-addon" style="width: 20%;">Item Name: </span>
				  <input type="text" class="form-control" style="width: 98%;" name="product_name" placeholder="Insert product name">


				</div>
				<br>

        <div class="input-group" style="width: 100%;">
				  <span class="input-group-addon" style="width: 20%;">Quantity - Quantity</span>
				  <input type="text" class="form-control" style="width: 98%;" name="qty" placeholder="Quantity of Quantity Quantity bottles">
				</div>
        <br>
        <div class="bootstrap-iso">

			 <div class="container-fluid">
				<div class="row">
					<div>
						<div class="form-group ">

						  <div >
						   <div class="input-group" style="width: 100%;">
							<span class="input-group-addon" style="width: 20%;">Date: </span>
							<input class="form-control" style="width: 98%;" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>

						 </div>
					</div>
				</div>
			 </div>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

		<script>
			$(document).ready(function(){
				var date_input=$('input[name="date"]'); //our date input has the name "date"
				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
				date_input.datepicker({
					format: 'yyyy-mm-dd',
					container: container,
					todayHighlight: true,
					autoclose: true,
				})
			})
		</script>

		</form>
      <!--asdfsadf-->
        <div class="modal-footer modal-footer-primary">
          <input type="submit" name="submit_product" value="Submit" class="btn btn-primary">
        </div>
      </div>

		</div>
	  </div>
   </div>
  </div>
  </body>

</html>
