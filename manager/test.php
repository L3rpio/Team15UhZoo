<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php ?>
  <form action="test.php" method="POST">
    <input type="text" name="test" value="testing">
    <button type="submit" name="submittingTest" value="Save Test">Save</button>
  </form>

</body>
</html>

<?php 
if(isset($_POST['submittingTest'])){
  $value = $_POST['test'];
  echo $value;
}

?>