<?php
// (A) LOAD WEB PUSH LIBRARY
include 'assets/vendor/autoload.php';
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

// (B) GET SUBSCRIPTION
$sub = Subscription::create(json_decode($_POST["sub"], true));
$endpoint = 'https://fcm.googleapis.com/fcm/send/abcdef...'; // Chrome

// (C) NEW WEB PUSH OBJECT - CHANGE TO YOUR OWN!
$push = new WebPush(["VAPID" => [
  "subject" => "izmeera2000@gmail.com",
  "publicKey" => "BJF9s842CaIRdkrZ8Ds5eTktDmDR2GLEhXSQAmXQOmtt9V1T5zCpKfsY_csHYOpU4ksD35tevV9cwPfZdpslTXY",
  "privateKey" => "bRWDz36z1GC7vCSoNtzrxNKyM1d1ElG6bVIBdzHQDmk"
]]);

// (D) SEND TEST PUSH NOTIFICATION
$result = $push->sendOneNotification($sub, json_encode([
  "title" => "Welcome!",
  "body" => "Yes, it works!",
//   "icon" => "PUSH-php-A.png",
//   "image" => "PUSH-php-B.png"
]));
$endpoint = $result->getRequest()->getUri()->__toString();

// (E) SHOW RESULT - OPTIONAL
if ($result->isSuccess()) {
  echo "Successfully sent {$endpoint}.";
} else {
  echo "Send failed {$endpoint}: {$result->getReason()}";
  $result->getRequest();
  $result->getResponse();
  $result->isSubscriptionExpired();
}
?>