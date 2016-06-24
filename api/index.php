<?php
//CREATE API 
require './dbMongo.php';
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/users/getUser/:user_id','getUser');
$app->get('/orders/getOrder/:order_id','getOrder');
$app->get('/orders/cancelOrder/:order_id','cancelOrder');


$app->run();


function getUser($user_id) {
	global $users_collection;       
        $details = $users_collection->findOne(array('userid'=>$user_id));
        echo '{"fetch user": ' . json_encode($details) . '}';
}


function getOrder($order_id) {
    global $orders_collection;       
        $details = $orders_collection->findOne(array('orderid'=>$order_id));
	echo '{"fetch order": ' . json_encode($details) . '}';
	
}





function cancelOrder($order_id) {
     global $orders_collection;       
    $details = $orders_collection->findOne(array('orderid'=>$order_id));
    if (! count($details)){
    echo '{"order not exist"}';
    exit();    
    }else{
        if ((int)$details['status']===2){
             echo '{"order already canceled"}';
             exit(); 
        }
    }
    $orders_collection->update(array("orderid"=>$order_id), 
     array('$set'=>array("status"=>"2")));
    
    echo '{"Cancel order": ' . json_encode(array('ok'=>'ok')) . '}';
		
}
