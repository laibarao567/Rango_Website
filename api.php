<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$action = $_GET['action'] ?? ($input['action'] ?? '');
$storage = __DIR__ . DIRECTORY_SEPARATOR . 'data';
if (!is_dir($storage)) mkdir($storage, 0775, true);
function save_record($file, $record) { global $storage; $path=$storage.'/'.$file; $items=file_exists($path)?json_decode(file_get_contents($path),true):[]; if(!is_array($items))$items=[]; $items[]=$record; file_put_contents($path,json_encode($items,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE),LOCK_EX); }
if ($method !== 'POST') { echo json_encode(['ok'=>true,'service'=>'Rango API','message'=>'API is running.']); exit; }
if ($action === 'newsletter') { $email=filter_var($input['email']??'',FILTER_VALIDATE_EMAIL); if(!$email){http_response_code(422);echo json_encode(['ok'=>false,'message'=>'Please enter a valid email.']);exit;} save_record('newsletter.json',['email'=>$email,'created_at'=>date('c')]); echo json_encode(['ok'=>true,'message'=>'Welcome to Rango ♡']); exit; }
if ($action === 'custom') { if(empty($input['name'])||empty($input['phone'])||empty($input['idea'])){http_response_code(422);echo json_encode(['ok'=>false,'message'=>'Please complete all fields.']);exit;} save_record('custom_orders.json',['name'=>trim($input['name']),'phone'=>trim($input['phone']),'idea'=>trim($input['idea']),'created_at'=>date('c')]); echo json_encode(['ok'=>true,'message'=>'Custom request received ♡']); exit; }
if ($action === 'order') { if(empty($input['customer'])||empty($input['items'])){http_response_code(422);echo json_encode(['ok'=>false,'message'=>'Order data is incomplete.']);exit;} save_record('orders.json',['customer'=>$input['customer'],'items'=>$input['items'],'created_at'=>date('c')]); echo json_encode(['ok'=>true,'message'=>'Order received ♡']); exit; }
http_response_code(404); echo json_encode(['ok'=>false,'message'=>'Unknown action.']);
