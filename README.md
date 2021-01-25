# nodblogin
PHP Connexion without DB connection

## Utility of using local login
 If you're trying to create a website with (for example) only one account, admin for example, this is way easier to do as I did.
 
The only problem is the "security" of the system, if someone has access to your website core or has an application to download website's files, he can open and see your username and password creditentials.

I'm a beginner but i think i should explain the code for person who wants to start PHP

## HTML PART
So in first, i'm gonna explain the HTML part, yes the file is .php but it works too.
PHP is a backend language, but, even in .php file you can add html to do at the same time the front and the back end of your code

In this part I just wrote a title, a charset ( text encoder ) and some responsive ( make compatible website with tablet and phone ).

The second part is the interesting part, let's decrypt what it says :
  In first there is an h1, it's for a title
  Second, there is a form with two parameters :
    ```
    method="POST"
    action="login.process.php"  
    ```
    method parameters is just saying what type of transport we're gonna use, to explain it way easier, imagine post is a plane and get is a train those are two options we could set in method="" parameter, BUT, i prefer post, idk why but i prefer, if i take the plane, it means that I'm not using the train, it's the same here, if I use the post methond for X form, everything related to this form has to be in post method. 
    
 Inside this form we have two label, label are like "a" mark, there purpose is to display text.
 Then we have three input, the first one is for the username, type="text" is just use to tell the website to let "clear" what we type in this input
 Second input, is for the password, type="pass" tells to te website to hide what the user type for security
 Last input is the submit input, it works as a button, and he's related to the form he's inside, when you press it, it gathered all the information of all inputs inside the form   and post them inside the http / s header.
  Thanks to the http header, the user's information are "save" inside are can travel between pages. 

```
<html>
    <head>
        <title>Login without db</title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, width=device-width, shrink-to-fit=no">
    </head>
    <body>
        <h1>Sign In without having a db setting up</h1>
            <form method="POST" action="login.process.php">
                <label for="username">Your username</label>
                    <input id="username" type="text" name="username" required>
                <label for="password">Your password</label>
                    <input id="password" type="pass" name="password" required>
                <input type="submit" name="login_btn" placeholder="Sign In">
            </form>
    </body>
</html>

```


## PHP Part

Now we're gonna make a login system in PHP

So in first, have a look inside the login.process.php

In first we open <?php  code   ?> to say to the website that everthing between thoses marks is gonna be PHP

 ```if (isset($_POST['login_btn']))``` says "if the button had been pressed", login_btn in the $_POST is here just to link with the name="login_btn" of the submit input in the previous page
 
After that, we're calling the function "checklen" 
```

//We're calling the checklen function to see if the creditentials aren't empty\\
        checklen();

```

The checklen function had been wrote juste here :
```

function checklen(){
        if (empty($_POST['username']) && empty($_POST['password'])) {
            return false;
        }else{
            return true;
        }
    }

```

Inside this function, it just says that if the username and the password that the user wrote are empty, it return false, else it'll return true.

Now we check that the checklen function returned true, if yes, we're binding as variables the username and password that the user wrote
```

if (checklen(true)) {
                //We're now binding as variables those $_POST creditentials ( not obligatory but it's way easier and faster )\\
                   $username = $_POST['username'];
                   $password = $_POST['password'];

```

Now this is the last part of the login and the validation

So the first "if" check if the entered username in correct, if yes, he does the same with the password.
If creditentials are right, we're starting the session, and setting up all the $_SESSION user info ( check the repo about it on my github ), be aware to write your redirection at the end if not, you'll be redirect before the PHP define what you wrote.

```

//All our test are done and fine, we're now gonna test if the credidentials that the user entered are the same as the sign in correct creditentials\\
                                    //Checking if USERNAME ($_POST['username']) is corresponding to the correct username we want.\\
                                    if ($username == 'change_this_to_what_you_want_as_username') {
                                        //If USERNAME is right, same for PASSWORD\\
                                        if ($password === 'change_this_to_what_you_want_as_password') {
                                            //User is correctly login after that and will be redirect to the welcome page, check $_SESSION tuto on my github page to see their utility and to understand why I wrote them here
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

```

The first echo says that if the password is uncorrect, user will see an error.
The second echo has the same purpose but for the username.

## Welcome page 

``` 
<?php
     session_start();

        if (empty($_SESSION['token']) || $_SESSION['token_num'] !== $_SESSION['token']) {
            session_abort();
            header('Location: login.php');
        }

        echo("Hello, " . $_SESSION['username']);
?>

```

Check the $_SESSION tuto on my repo to understand everything on this welcome page.


That's the end, you're now on the Welcome page.
