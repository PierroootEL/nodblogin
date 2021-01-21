<?php
    //Get the login form from the previous page\\

    if (isset($_POST['login_btn'])) {
        //We're calling the checklen function to see if the creditentials aren't empty\\
        checklen();
            //We're checking if the checken return true, if yes, we continue\\
            if (checklen(true)) {
                //We're now binding as variables those $_POST creditentials ( not obligatory but it's way easier and faster )\\
                   $username = $_POST['username'];
                   $password = $_POST['password'];
                             //All our test are done and fine, we're now gonna test if the credidentials that the user entered are the same as the sign in correct creditentials\\
                                    //Checking if USERNAME ($_POST['username']) is corresponding to the correct username we want.\\
                                    if ($username == 'change_this_to_what_you_want_as_username') {
                                        //If USERNAME is right, same for PASSWORD\\
                                        if ($password === 'change_this_to_what_you_want_as_password') {
                                            //User is correctly login after that and will be redirect to the welcome page, check $_SESSION attribute to understand why I wrote them here
                                            session_start();
                                            $_SESSION['token'] = random_int('0', '999');
                                            $_SESSION['token_num'] = $_SESSION['token'];
                                            $_SESSION['username'] = $username;
                                            header('Location: welcome.php');
                                        }else{
                                            echo("Password not right");
                                        }
                                    }else{
                                        echo("Username not right");
                                    }
                                }
                        }


    function checklen(){
        if (empty($_POST['username']) && empty($_POST['password'])) {
            return false;
        }else{
            return true;
        }
    }

?>
