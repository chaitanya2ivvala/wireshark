<?php
	ob_start();
	session_start();
	require_once 'connect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>

﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>WIRESHARK MESSENGER</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" />

</head>
<body style="font-family:Verdana">

  <div class="container">
<div class="row " style="padding-top:40px;">
    <h3 class="text-center">WIRESHARK MESSENGER</h3>
    <br /><br />
    <div class="col-md-8">
	
        <div class="panel panel-info" >
            <div class="panel-heading">
                
				<h4><?php echo $userRow['username']; ?></h4>
            </div>
			<div class="panel panel-body">
			    <div class="pre-scrollable">
			
            
                        <ul class="media-list">

                                    <li class="media">

                                        <div class="media-body">

                                            
                                                <div class="media-body" >
                                                         HI ANUSHA HOW ARE YOU
                                                    <br />
                                                   <small class="text-muted">ANUSHA | 23rd June at 5:00pm</small>
                                                    <hr />
                                                
                                            </div>

                                        </div>
									</li>
									
									
									
									
                          
								    <li class="media">

                                        <div class="media-body">

                                            
                                                <div class="media-body" >
                                                  HI CHAITANYA HOW R U
                                                    <br />
                                                   <small class="text-muted"><?php echo $userRow['username']; ?>| <?php echo $userRow['checkin']; ?></small>
                                                    <hr />
                                                </div>
                                            

                                        </div>
                                    </li>
                                   
								    
									  
                                    
                                </ul>
							</div>
			     </div>
             
            <div class="panel-footer">
                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Message" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-info" type="button">SEND</button>
                                    </span>
           
	            </div>	
	        </div>
        
	</div>	
	</div>	
        
    
   


   <div class="col-md-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
               ONLINE USERS
            </div>
            <div class="panel-body">
			    <div class="nasir">
                                <ul class="media-list">

                                    <li class="media">

                                        <div class="media-body">

                                           
                                               
                                                <div class="media-body" >
                                                    <h5>NASIR | User </h5>
                                                    
                                                   <small class="text-muted">Active From 3 hours</small>
                                                </div>
                                            

                                        </div>
                                    </li>
                         
             						<li class="media">

                                        <div class="media-body">

                                            
                                                <div class="media-body" >
                                                    <h5>ANUSHA | User </h5>
                                                    
                                                   <small class="text-muted">Active From 3 hours</small>
                                                </div>
                                            

                                        </div>
                                    </li>
                                    
                                    
									
									
                                </ul>
                
                </div>
        
    </div>
</div>
  </div>
</body>
</html>