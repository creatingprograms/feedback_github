<?php
declare(strict_types=1);

require_once('Request.php');
require_once('Manager.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(isset($_POST["register"])) {
if( !empty($_POST['email']) ) {

$email1 = (string) htmlentities(htmlspecialchars($_POST['email']));

$email = iconv_strlen($email1, 'UTF-8');
if( $email === false ) {
echo "Еmail содержит недопустимые символы!";
}
if($email) {

if( $email > 50 ) {
echo "Еmail должен содержать не более 50 символов!";
}
if( $email <= 50 ) {

$userEmail = filter_var($email1, FILTER_VALIDATE_EMAIL);
if( $userEmail === false ) {
echo "Email указан неверно!";
}

if($userEmail) {
$info = $userEmail;
$request = new Request($info);
$manager = new Manager($request);
$manager->handle();
}
}
}
}
}
}
?>
