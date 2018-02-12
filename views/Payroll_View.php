<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Manager-Crystal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" tyspe="text/css" href="<?php echo base_url().'css/style1.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/css/bootstrap.min.css';?>">
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Payroll and Management System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="<?php echo base_url().'';?>" rel="shortcut icon">
    <link href="<?php echo base_url().'assets/css/justified-nav.css';?>" rel="stylesheet">


    <link href="<?php echo base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url().'assets/css/search.css';?>" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">
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
  
	<div class="navbar navbar-inverse navbar-static-top nav-position">
		<div class="container">
			<a href="<?php echo base_url().'user'?>" class="navbar-brand">Dashboard</a>
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
            
        <div class="collapse navbar-collapse navHeaderCollapse">
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url().'user'?>">Home</a></li>
				<li><a href="<?php echo base_url().'staff/man'?>">Add System user</a></li>
				<li><a href="#menu">Menu</a></li>
				<li><a href="#Reservation">Reservations</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Inventory</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url().'Hotel'?>">Hotel</a></li>
						<li><a href="<?php echo base_url().'Kitchen'?>">Kitchen</a></li>
						<li><a href="#">Restaurant</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url().'Payroll_Controller'?>">Payroll Management</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
      			<li><a href="<?php echo base_url().'main/logout'?>">Log out</a></li>
    	</ul>

		</div>
	</div>
	</div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#dailycal" class="btn btn-primary">Calculate Daily Working Hours</button>
                <button type="button" data-toggle="modal" data-target="#salarycal" class="btn btn-primary">Calculate Salary</button>
                <button type="button" data-toggle="modal" data-target="#overtime" class="btn btn-primary">Modify Overtime Rate</button>
                <button type="button" data-toggle="modal" data-target="#salary" class="btn btn-primary">Modify Salary Rate</button>
                <button type="button" data-toggle="modal" data-target="#bonus" class="btn btn-primary">Modify Bonus</button>
                <br></br>
                <p align="center"><big><b>Payroll and Management System</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      
                        <tr class="info">
						  <th><p align="center">Employee ID</p></th>
                          <th><p align="center">Employee Name</p></th>
                          <th><p align="center">Basic Salary</p></th>
                          <th><p align="center">Overtime Hours</p></th>
                          <th><p align="center">Overtime Rate</p></th>
						  <th><p align="center">Overtime pay</p></th>
                          <th><p align="center">Bonus</p></th>
                          <th><p align="center">Net Pay</p></th>
                        </tr>
                      
                      <tbody>
                       
                         <?php

                          if((sizeof($pay_details))>0)
                          {
                            foreach ($pay_details as $info)
                            {
                              ?>
                              <tr>
                                <td align='center'><?php echo $info->employee_id;?></td>
                                <td align='center'><?php echo $info->employee_name;?></td>
                                <td align='center'><?php echo $info->basic_sal;?></td>
                                <td align='center'><?php echo $info->overtime_h?> Hours </td>
                                <td align='center'><?php echo $info->overtime_r?></td>
                                <td align='center'><?php echo $info->overtime_p?></td>
                                <td align='center'><?php echo $info->em_bonus?></td>
                                <td align='center'><?php echo $info->em_net_pay?></td>
                              <?php
                            }
                          }
                          else
                          {
                            ?> <tr><td colspan='3'>Data Not Found</td></tr>
                        <?php  }

                        ?>
                      
                      
                      </tbody>

                        <tr class="info">
						  <th><p align="center">Employee ID</p></th>
                          <th><p align="center">Employee Name</p></th>
                          <th><p align="center">Basic Salary</p></th>
                          <th><p align="center">Overtime Hours</p></th>
                          <th><p align="center">Overtime Rate</p></th>
						  <th><p align="center">Overtime pay</p></th>
                          <th><p align="center">Bonus</p></th>
                          <th><p align="center">Net Pay</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>
          
        <!-- this modal is for CALCULATE DAILY HOURS -->
        <div class="modal fade" id="dailycal" role="dialog">
            <div class="modal-dialog modal-sm">
        
              <!-- Modal content-->
                <div class="modal-content" >
                    <div class="modal-header" style="padding:10px 10px;">
                      <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                      <h3 align="center">Are you sure want to calculate daily hours for every employee?</h3>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form class="form-horizontal" action="Payroll_Controller/" method="post">
                            <div class="form-group">
                                <div class="form-group" align="center">
                                    <input type="submit" name="OK" class="btn btn-success" value="OK">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- this modal is for CALCULATE salary -->
        <div class="modal fade" id="salarycal" role="dialog">
            <div class="modal-dialog modal-sm">
        
              <!-- Modal content-->
                <div class="modal-content" >
                    <div class="modal-header" style="padding:10px 10px;">
                      <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                      <h3 align="center">Are you sure want to calculate salary for every employee?</h3>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">
                        <form class="form-horizontal" action="Payroll_Controller/" method="post">
                            <div class="form-group">
                                <div class="form-group" align="center">
                                    <input type="submit" name="OK" class="btn btn-success" value="OK">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
      <!-- this modal is for OVERTIME -->
      <div class="modal fade" id="overtime" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="Payroll_Controller/form_validation" method="post">
                <div class="form-group">
                    <input type="text" name="emp_id" class="form-control" placeholder="Employee ID" value="" required="required">
					<br> </br>
					 <input type="text" name="over_r" class="form-control" placeholder="New Overtime rate" value="" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for SALARY -->
      <div class="modal fade" id="salary" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Salary</b></big> rate.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="Payroll_upSal/form_validation" method="post">
                <div class="form-group">
                    <input type="text" name="emp_id" class="form-control" placeholder="Employee ID" value="" required="required">
					<br> </br>
					<input type="text" name="sal" class="form-control" placeholder="New Salary Rate" value="" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- this modal is for BONUS -->
      <div class="modal fade" id="bonus" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Bonus</b></big>.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="Payroll_upBonus/form_validation" method="post">
                <div class="form-group">
                    <input type="text" name="emp_id" class="form-control" placeholder="Employee ID" value="" required="required">
					<br> </br>
					<input type="text" name="bonus" class="form-control" placeholder="Bonus Amount" value="" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url().'assets/js/jquery.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="<?php echo base_url().'assets/js/search.js';?>"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    

  </body>
</html>