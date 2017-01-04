<?php
if($_POST['formSubmit'] == "Submit")
{
  $errorMessage = "";
  
  if(empty($_POST['formMovie']))
  {
    $errorMessage .= "<li>You forgot to enter a movie!</li>";
  }
  if(empty($_POST['formName']))
  {
    $errorMessage .= "<li>You forgot to enter a name!</li>";
  }
  
  $varMovie = $_POST['formMovie'];
  $varName = $_POST['formName'];

  if(empty($errorMessage)) 
  {
    $fs = fopen("mydata.csv","a");
    fwrite($fs,$varName . ", " . $varMovie . "\n");
    fclose($fs);
    
    header("Location: personal-info.html");
    exit;
  }
}
?>
<!DOCTYPEHTM> 
<html>
<head>
  <title>My Form</title>
</head>

<body>
  <?php
    if(!empty($errorMessage)) 
    {
      echo("<p>There was an error with your form:</p>\n");
      echo("<ul>" . $errorMessage . "</ul>\n");
    } 
  ?>
  <form action="add-student.php" method="post">
    <p>
      What is your favorite movie?<br>
      <input type="text" name="formMovie" maxlength="50" value="<?=$varMovie;?>" />
    </p>
    <p>
      What is your name?<br>
      <input type="text" name="formName" maxlength="50" value="<?=$varName;?>" />
    </p>        
    <input type="submit" name="formSubmit" value="Submit" />
  </form>
</body>
</html>