<?php 
session_start();
require_once "../connection/ApiController.php";
$portCont = new shopController();


if(!empty($_GET['view']))
{
    if($_GET['view'] == 'renew')
    {
        if(!empty($_GET['uid']))
        {
            $uid = $_GET['uid']; 
            $account = $portCont->checkForgotten($uid);
        }
    }
}

if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        
        case "validate": 
        if(isset($_POST['login'])){
            
            $uid = $_POST['uid'];
            $password = md5($_POST['password']);
           
            if(!empty($uid) && !empty($password))
            {
             
             
             $userCredentials = $portCont->userLogin($password, $uid);
             if(!empty($userCredentials))
             {
                $email = $userCredentials[0]["email"];
                $code = rand(6666,9999);
                $portCont->userMailValidation($email, $uid, $code);
                require "../mail/verification.php";

                if($userCredentials[0]["designation"] == 1)
                {
                    $_SESSION['user_id'] = $userCredentials[0]["user_id"];
                    $user_id = $_SESSION['user_id'];
                    
                    if (isset($_POST['remember_me'])) {
                        function generateRandomToken($length = 32) {
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $token = '';
                        
                            for ($i = 0; $i < $length; $i++) {
                                $token .= $characters[mt_rand(0, strlen($characters) - 1)];
                            }
                        
                            return $token;
                        }
                        
                        $token = generateRandomToken();
                        $portCont->saveTokenToDatabase($user_id, $token);
                        setcookie('remember_me_cookie', $token, time() + (30 * 24 * 60 * 60)); // Cookie expires in 30 days
                    }
                    
                    header('Location: security.php');
                    exit;
                }
                else if($userCredentials[0]["designation"] == 2)
                {
                  
                    $_SESSION['user_id'] = $userCredentials[0]["user_id"];
                    $user_id = $_SESSION['user_id'];

                    if (isset($_POST['remember_me'])) {
                        function generateRandomToken($length = 32) {
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $token = '';
                        
                            for ($i = 0; $i < $length; $i++) {
                                $token .= $characters[mt_rand(0, strlen($characters) - 1)];
                            }
                        
                            return $token;
                        }
                        $token = generateRandomToken();
                        $portCont->saveTokenToDatabase($user_id, $token);
                        setcookie('remember_me_cookie', $token, time() + (30 * 24 * 60 * 60)); // Cookie expires in 30 days
                    }
                    header('Location: security.php');
                    exit;
                }
                else
                {   
                   
                    $_SESSION['user_id'] = $userCredentials[0]["user_id"];
                    $user_id = $_SESSION['user_id'];

                    if (isset($_POST['remember_me'])) {
                        function generateRandomToken($length = 32) {
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $token = '';
                        
                            for ($i = 0; $i < $length; $i++) {
                                $token .= $characters[mt_rand(0, strlen($characters) - 1)];
                            }
                        
                            return $token;
                        }
                        $token = generateRandomToken();
                        $portCont->saveTokenToDatabase($user_id, $token);
                        setcookie('remember_me_cookie', $token, time() + (30 * 24 * 60 * 60)); // Cookie expires in 30 days
                    }
                    header('Location: security.php');
                    exit;
                } 
            }else{

            }
          }
        }
        break;   


        case "forgot": 
        if(isset($_POST['validate']))
        {
            $uid = $_POST['uid']; 
            $email = $_POST['email'];

           $validateForgot = $portCont->checkExistence($uid, $email);

           if(!empty($validateForgot))
           {
                $uids = $validateForgot[0]["uid"];
                $email = $validateForgot[0]["email"];
                $generate_code = rand(6666,9999);
                $status = 'RENEWED'; 
                require "mail/generationForgotEmail.php";
                $portCont->insertForgotten($uids, $generate_code, $status);
                header('Location: index.php?view=renew&uid='.$uids);
           }
           else
           {
               header('Location: index.php');
           }

        }
        break;

        case "generatepassword":
            if(isset($_POST['update']))
            {
               $ocode = $_POST['ocode']; 
               $email = $_POST['email']; 
               $uid = $_POST['uid'];
               $code = $_POST['code']; 
               $new_password = $_POST['new_password']; 
               $password = md5($new_password); 

               if($ocode == $code)
               {
                  require "mail/generatedForgotEmail.php";
                  $portCont->updatePassword($password, $uid, $email);
                  header('Location: index.php');
               }else{
                  header('Location: index.php?view=renew&uid='.$uid);
               }

            }
        break;




    }
}


?>