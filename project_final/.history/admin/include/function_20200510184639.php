<?php
// function to make more direct in the same page
ob_start();
include('connection.php');

//make function direct
function direct($slug){
    header("Location:$slug");
}

///return count data
function countItems($item,$table) {
    global $conn;
    $query= "SELECT COUNT($item) FROM $table";
    $result= mysqli_query($conn,$query);
    return $row= mysqli_fetch_assoc($result);
   

                               }

function promoCode() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
       


function sendmail($to, $message) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port     = 587;  
    $mail->Username = "alo2.omar92@gmail.com";
    $mail->Password = "cs123456cs";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("alo2.omar92@gmail.com", " Pustok.bookStore");
    $mail->AddAddress($to);
    $mail->Subject = "Pustok.bookStore";
    $mail->WordWrap   = 80;
    $content = "<b>".$message."</b>"; $mail->MsgHTML($content);
    $mail->IsHTML(true);
    if(!$mail->Send()) 
    echo "Problem sending email.";
    else 
    echo "email sent.";}
    ?>



?>