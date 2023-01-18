<?php
    $page_title = 'Rental Management System - Login';

    //we start session since we need to use session values
    session_start();
    //creating an array for list of users can login to the system
    
/*     require_once '../dbconnect.php'; */
     $error="";  
    if (isset($_POST['login'])) {  
      $username=mysqli_real_escape_string($conn,$_POST['username']);  
      $password=mysqli_real_escape_string($conn,$_POST['password']);  
      $sql=mysqli_query($conn,"select * from account where username='$username' && password='$password'");  
      $num=mysqli_num_rows($sql);  
      if ($num>0) {  
           $row=mysqli_fetch_assoc($sql);
           $_SESSION['user_id'] = $row['id'];  
           $_SESSION['logged-in'] = $username;
           $_SESSION['fullname']=$row['firstname'] . ' ' . $row['lastname'];
           $_SESSION['user_type'] = $row['type'];

            //header('location: ../home.php');
      }
        //set the error message if account is invalid
        $error = 'Invalid username/password. Try again.';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="Content-Language" content="de, fr, it"/> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable-0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">    
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css” />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="vh-100 gradient-custom">
    <section>
        <div class="fs-4">
            <div class="cardd text-white">
                <div class="p-4 text-center">
                    <h3 class="fs-1 mb-5">Welcome!</h3>
                    <form action="index.php" class="text-white" method="post">
                        <div class="row justify-content-center align-items-center h-100">
                            <div class="text-white">
                            <div class="card-body">
                                <input type="email" name="username" id="tran" class="text-white " placeholder="Username" required tabindex="1" />
                            </div>
                            <div class=" mb-4 card-body">
                                <input type="password" name="password" id="tran" class="text-white " placeholder="Password" required autocomplete="current-password" required tabindex="2"/>
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                           </div>
                            <div class="fs-6 mb-4 mx-5 d-flex justify-content-start text-white">
                                <label>
                                    <input type="checkbox" name="remember" id="check"> Remember me
                                </label>
                            </div>
                            <button type="submit" class="px-6 mb-1 btncol text-white width" value="Login" name="login" tabindex="3">Login</button><br>
                            <a href="" class="fs-6 text-dark no-underline text-white">Forgot Password?</a>
                            <?php
                                //Display the error message if there is any.
                                if(isset($error)){
                                    echo '<div><p class="error">'.$error.'</p></div>';
                                }
                                
                            ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        const togglePassword = document
            .querySelector('#togglePassword');
  
        const password = document.querySelector('#password');
  
        togglePassword.addEventListener('click', () => {
  
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';

            password.setAttribute('type', type);
  
            // Toggle the eye and bi-eye icon
            this.classList.toggle('fa-eye');
        });
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
