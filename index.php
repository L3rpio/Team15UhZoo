<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Hello guys!</h1>
    <p>this should work but idk why it's not working</p>
    <?php 
      function ReadData() {
        try
          {
            $conn = OpenConnection();
            $tsql = "SELECT [CompanyName] FROM SalesLT.Customer";
            $getProducts = sqlsrv_query($conn, $tsql);
            if ($getProducts == FALSE)
              die(FormatErrors(sqlsrv_errors()));
            $productCount = 0;
            while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
            {
              echo($row['CompanyName']);
              echo("<br/>");
              $productCount++;
            }
            sqlsrv_free_stmt($getProducts);
            sqlsrv_close($conn);
          }
          catch(Exception $e)
          {
            echo("Error!");
          }
      }
      echo("hello world");
    ?>
  </body>
</html>
