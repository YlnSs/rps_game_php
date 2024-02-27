<?php
function check($computer, $human)
{
    if($computer==$human)
    {
        return "Game is Tie. Friendship won.";
    }
    else if($computer==2&&$human==0||$computer==1&&$human==2||$computer==0&&$human==1)
    {
        return "You Win!";
    }
    else
    {
        return "You Lose. Try Again.";
    }

}
function testt($namee)
{
    for($i=0;$i<count($namee);$i++)
    {
        for($j=0;$j<count($namee);$j++)
        {
            $game_result=check($i,$j);
            print "Human=$namee[$j] Computer=$namee[$i] and the result is: $game_result\n";

        }
    }

}
$Names=array("rock","paper","scissor");
if(! isset($_GET["name"])||strlen($_GET["name"]<1))
{
    die("Name Parameter Missing!");
}
if(isset($_POST["logout"]))
{
header("Location: index.php");
return;
}
$welcomemsg="Hello, Welcome ".$_GET["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROCK-PAPER-SCISSOR GAME</title>
</head>
<body>
<p><?=htmlentities($welcomemsg)?></p>
<form method="post">
<label for="ropasc">Please select a move:</label>
<select name="rps" id="ropasc">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissor</option>
<option value="test">Test</option>
</select>
<input type="submit" name="sbmt" value="Play"/>
<input type="submit" name="logout" value="Logout"/>
<br>
<pre>
<?php
    if(isset($_REQUEST["rps"])){
        if($_REQUEST["rps"]==-1){
            print("Choose your strategy from a selection bar on above");
        }
        else if($_REQUEST["rps"]=="test"){
            testt($Names);
        }
        else{
            $comp_move=rand(0,2);
            print("Your play ".$Names[$_REQUEST["rps"]]." "."Computer Played ".$Names[$comp_move]." ".check($comp_move,$_REQUEST["rps"]));
        }
    }
?>
</pre>
</form>  
</body>
</html>