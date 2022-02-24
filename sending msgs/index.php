
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700;800;900&display=swap" rel="stylesheet">
    <title>send messages</title>
</head>
<body>

    <div class="container containing">
        <div class="row">
            <div class="col-md-4 offset-md-4 content">
                <h1 class="text-center">send message</h1>
                <p class="text-center">send mail to anyone from localhost</p>
                <!-- start php  -->
                <?php 

                    if(isset($_POST["send"])) {

                        $email      = $_POST["email"];
                        $subject    = $_POST["subject"];
                        $message    = $_POST["message"];

                        $formErrors = array();

                        if(empty($subject)) {

                            $formErrors[] = "sub canot be empty";
                        }
                        if(strlen($message) <= 10) {

                            $formErrors[] = "message must be more than 10";
                        }

                        foreach($formErrors as $error) {?>

                            <div class="alert alert-danger text-center"><strong>Error !</strong><?php echo $error ?> </div>
                            
                        <?php
                        
                        }
                        $headers = "From:" . $email . "\r\n";
                        $myemail = "ahfouad12@gmail.com";

                        if(empty($formErrors)) {

                            mail($myemail, $subject, $message, $headers); ?>

                            <div class="alert alert-success text-center"><strong>success !</strong>Sending done. </div>

                            <?php 
                        }
                        else {

                            ?><div class="alert alert-danger text-center"><strong>Error !</strong>Sending Failed. </div><?php
                        }
                    }
                
                ?>
                <!-- end php  -->
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="recepient mail" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="message" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="send" class="form-control btn btn-primary" value="send">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/form.js"></script>
    
</body>
</html>