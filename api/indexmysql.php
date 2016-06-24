<?php
include 'db.php';
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/users/getUser/:user_id','getUser');
$app->get('/orders/getOrder/:order_id','getOrder');
$app->get('/orders/cancelOrder/:order_id','cancelOrder');


$app->run();


function getUser($user_id) {
	$sql = "SELECT * FROM `users` AS A WHERE A.userid=:user_id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id);		
		$stmt->execute();		
		$details = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"fetch user": ' . json_encode($details) . '}';
		
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function getOrder($order_id) {
	$sql = "SELECT * FROM `orders` AS A WHERE A.orderid=:order_id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
                $stmt->bindParam("order_id", $order_id);		
		$stmt->execute();		
		$details = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"fetch order": ' . json_encode($details) . '}';
		
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}
function cancelOrder($order_id) {
    
        $sql = "SELECT * FROM `orders` AS A WHERE A.orderid=:order_id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
                $stmt->bindParam("order_id", $order_id);		
		$stmt->execute();		
		$details = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		if (! count($details)){
                echo '{"order not exist"}';
		exit();    
                }else{
                    if ((int)$details[0]->status===2){
                         echo '{"order already canceled"}';
                         exit(); 
                    }
                }
                
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}

        $sql = "UPDATE `orders` SET `status` = '2' WHERE `orders`.orderid=:order_id";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
                $stmt->bindParam("order_id", $order_id);		
		$res =  $stmt->execute();		
                $return = array('ok'=>'ko');
		if ($res){
                    $return['ok']='ok';
                }
                
                
		$db = null;
		echo '{"Cancel order": ' . json_encode($return) . '}';
		
	} catch(PDOException $e) {
	    //error_log($e->getMessage(), 3, '/var/tmp/php.log');
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}

?>