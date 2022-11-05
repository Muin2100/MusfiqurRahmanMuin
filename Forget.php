<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Login Page</title>
 </head> 
    <?php  
        $message = '';  
        $error = '';  
 if(isset($_POST["password"]))  
 {  
      if(empty($_POST["password"]))  
      {  
           $error = "<label class='text-danger'>Enter Old password</label>";  
      }
      else if(empty($_POST["New_password"]))  
      {  
           $error = "<label class='text-danger'>Enter New_password</label>";  
      }  
      else if(empty($_POST["Retyped_Password"]))  
      {  
           $error = "<label class='text-danger'> Retyped_Password</label>";  
      } 
      else  
      {  
           if(file_exists('password.json'))  
           {  
                $current_data = file_get_contents('password.json');  
                $array_data = json_decode($current_data,true);  
                $extra = array(  
                     'password'     =>     $_POST['password'],  
                     'New_password'   =>     $_POST["New_password"],  
                     'Retyped_Password' =>     $_POST["Retyped_Password"]
                );  
                $array_data = $extra;  
                $final_data = json_encode($array_data); 
                if(file_put_contents('password.json', $final_data))  
                {  
                     $message = "File Appended Success fully";  
                }  
           }  
           else  
           {  
            function fileCreateWrite(){
                $file=fopen("file.json","w");
                $array_data=array();
                $extra = array(
                    'password'     =>     $_POST['password'],  
                    'New_password'   =>     $_POST["New_password"],  
                    'Retyped_Password' =>     $_POST["Retyped_Password"]
                );
                $array_data[] = $extra;
                $final_data = json_encode($array_data);
                fclose($file);
                return $final_data;
        }
           }  
      }  
 }  
 ?>



<body class="main-container">
    <h2>Please Login</h2>

    <form method="post" action="" >
        <div class="form">
            <label for="password" class="form-label">
            Password: <input type="text" name="Password" id="Password" />
            </label>
        </div>

        <div class="form">
            <label for="New_password">
            New_password: <input type="New_password" name="New_password" id="New_password" />
            </label>
        </div>

        <div class="form">
            <label for="Retyped_Password">
            Retyped_Password: <input type="Retyped_Password" name="Retyped_Password" id="Retyped_Password"  />
            </label>
        </div>
        </div>
        <div class="center">
            <input class="button" type="submit" value="Login" />
        </div>
        </body>

</html>