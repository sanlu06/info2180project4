<?php
session_start();

$con = mysql_connect('localhost','root','');
if (!$con){
	die('Could Not Connect!');
}

@mysql_select_db("info2180project4") or die ("Sorry but database not found. Please try again.");

$un=$_POST['un'];
$pw=$_POST['pw'];
    
            
//If the user is logged, we log the user out
if(isset($_SESSION['un']))
{
  
    unset($_SESSION['un'], $_SESSION['id']);
?>

<div>Thank you for using Cheapo Mail!<br/>
     You have successfuly been loged out.<br/> <a href="<?php echo $url_home; ?>">Home</a></div></div>

<?php
}
else
{
    $ousername = '';
    //We check if the form has been sent
    if(isset($_POST['un'], $_POST['pw']))
    {
 
        $req = mysql_query('select password,id from user where username="'.$username.'"');
        $ck = mysql_fetch_array($req);
        
		//We compare the submited password and the real one, and we check if the user exists
        if($ck['password']==$password and mysql_num_rows($req)>0)
        {
            $form = false;
        
            $_SESSION['un'] = $_POST['un'];
            $_SESSION['id'] = $dn['id'];
?>
You have successfuly been logged. <br />
<a href = "http://localhost/home.php">Menu</a>

<?php
        }
        else
        {
            //Otherwise, we say the password is incorrect.
            $form = true;
            $message = 'The username or password is incorrect.';;
        }
    }
    else
    {
        $form = true;
    }
    if($form)
    {
    
    if(isset($message))
       { 
        echo '$message';
       }
    }
}


/*
	Group Members ID
	620057953
	620053878
	620070170
*/
?>

       
    </body>
</html>