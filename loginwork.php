<?php
	session_start();
	
    if($_POST["id"]!='' && $_POST["pass"]!='')
	{
		$id = $_POST["id"];
		$pass = $_POST["pass"];
        
        
        $conn = new mysqli("localhost", "root", "" , "rss");
        $sql = "SELECT * FROM customer WHERE PHONENO='$id' AND PASS='$pass'";
        
        $result = $conn->query($sql);
        

        if ($result->num_rows > 0) {
            $first_column = $result->fetch_object();

            $_SESSION['id'] = $id;
            $_SESSION['utype'] = $first_column->ROLE;

            if ($first_column->ROLE == 'admin') {
                header('Location: addtrainview.php');
            } else {
                header('Location: userhome.php');
            }
        } else {
            $_SESSION['alert']="USERNAME or PASSWORD is Incorrect";
            //echo "USERNAME or PASSWORD is incorrect";
            header('Location: login.php');
        }
    }    
        
        
        
        
/*        
		$query = "select pass from customer where phoneno = '$id'";
        $query2 = "select phoneno from customer where phoneno = '$id'";
        //$result = mysqli_parse($conn, $query);
        //$result2 = mysqli_parse($conn, $query2);
		mysqli_execute($result);
        mysqli_execute($result2);
		$row = mysqli_fetch_array($result,mysqli_BOTH);
        $row2 = mysqli_fetch_array($result2,mysqli_BOTH);
	    
        if($id=="")
        {
            $_SESSION['alert']= "Please enter ID(Phone Number)";   
        }
        else
        {
           if(mysqli_num_rows($result2)>0)
            {
                if($pass=="")
                {
                    $_SESSION['alert']= "Please enter Password";
                }
                else 
                {
                    if($row[0]==$pass)
                    {
                        $_SESSION['id'] = $id;
                        $sql0 = "select status from admin where phone = $id";
                        $result0 = mysqli_parse($conn,$sql0);
                        mysqli_execute($result0);
                        $row0 = mysqli_fetch_array($result0,mysqli_BOTH);
                        if($row0[0]=='admin')
                        {
                            $_SESSION['utype'] = $row0[0];
                            header("Location:addtrainview.php");
                        }
                        else
                        {
                            $_SESSION['utype'] = $row0[0];
                            header("Location:userhome.php");
                        }
                        
                    }
                    else
                    {			
                        $_SESSION['alert']= "Wrong Password";
                    }
                }
            }
            else
            {
                $_SESSION['alert']= "Wrong id";
            }
            
        }
        
		//header("Location:login.php");
	}
    else
    {
        $_SESSION['alert']= "Enter Id Password";
        
    }
header("Location:login.php");
*/
?>
