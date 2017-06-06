<?php

$app->get('/api/user', function(){
	require_once ('connect.php');
	$q = mysql_query("SELECT * FROM users order by id");
                    //display all the results
                    while($row = mysql_fetch_array($q)){
						$data[] = $row;
						
						
                    }
					echo json_encode($data);
	});
	
	$app->get('/api/user/{id}', function($request){
	require_once ('connect.php');
	$id = $request->getAttribute('id');
	
	$q = mysql_query("SELECT * FROM users where id=$id");
                    
                    $row = mysql_fetch_array($q);
						$data[] = $row;
						
						
                    
					echo json_encode($data);
	});
	

	$app->map (['GET','DELETE'],'/api/messages/{id}', function($request){
	require_once ('connect.php');
	$id = $request->getAttribute('id');
	
	  $query = "DELETE from messages WHERE id = $id";
 
 $result = mysql_query($query);
                   
	});
	
	$app->map (['GET','POST'],'/api/post/{user1}/{user2}', function($request){
	require_once ('connect.php');
	$user1= $request->getAttribute('user1');
	$user2 = $request->getAttribute('user2');
	
	  $query = "INSERT INTO chat (user1,user2) VALUES ($user1,$user2)";
	  $result = mysql_query($query);
 

 

 
 
  
 
                   
	});