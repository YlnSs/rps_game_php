<?php
if(isset($_POST["cancelboi"])){
    header("Location:index.php");
    return;
}
$message=false;
$correct_md5=hash("md5","XyZzy12*_php123"); #plain text of password is php123 and it's salt is XyZzy12*_ so it is salted password which makes it more complicated to get broken.
$salt="XyZzy12*_";
if(isset($_POST["who"])&& isset($_POST["pass"]))
{
    if(strlen($_POST["who"]<1 && strlen($_POST["pass"]<1)))
    {
        $message="Username and password are required!";
    }
    else
    {
        $try_md5=hash("md5",$salt.$_POST["pass"]);
        if($correct_md5==$try_md5)
        {
            header("Location: game.php?name=".urlencode($_POST["who"]));
            return;
        }
        else
        {
            $message="Your passsword is incorrect. Try again.";
        }
    }
}
{

}
?>
<html>
<h1>Log In Page</h1>
<form method="post">
<label for="nickname">Nickname:</label>
<input type="text" name="who" id="nickname"/>
<br>
<label for="psword">Password:</label>
<input type="password" name="pass" id="psword"/>
<br>
<input type="submit" value="Log In"/>
<input type="submit" value="Cancel" name="cancelboi"/>
<?php
if($message!==false)
{
echo ('<p style="color:red;">'.htmlentities($message)."</p>");
}
?>

</form>
</html>