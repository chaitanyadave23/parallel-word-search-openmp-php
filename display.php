<?php

include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Word Search</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


    <style>
      .navbar-brand{
        font-size: 1.8em;
      }
      #topContainer {
        background-image: url("background3.jpg");
        height: 400px;
        width: 100%;
        background-size: cover;
      }
      #topRow{
        margin-top: 100px;
        text-align: center;

      }
      #topRow h1{
        font-size: 300%;
      }
      .bold{
        font-weight: bold;
      }
      .marginTop{
        margin-top: 30px;
      }
      .center{
        text-align: center;
      }
      .title{
        margin-top: 100px;
        font-size: 300%;
      }
      #footer{
        background-color:#B0D1FB;
        padding-top: 70px;
        width: 100%; 

      }
      .marginBottom{
        margin-bottom: 30px;
      }
      .appstoreImage{
        width:250px;
      }
    </style>

  </head>
  <body>

  <div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          
        </button>

        <a class="navbar-brand">WordSearch</a>
      </div>
        
    </div>

  </div>

  <div class="container contentContainer" id="topContainer" style="position: relative; left: 300px; top: -80px;">

    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="topRow">
          <h1 class="marginTop">WordSearch</h1>

          <p class="lead">This is the web interface for the Parallel Word Search.</p>

          <p>Openmp is the underlying technology</p>
          <p class="bold marginTop">Interested? Check it how awesome it is!</p>

          <form class="marginTop" action="display.php" method="GET">
            
            <div class="input-group">
              
              <input type="text" placeholder="Search term goes here...." class="form-control" name="query" />
              </div>
              <input type="submit" name="submit" class="btn btn-success btn-lg marginTop" />
            

          </form>

        </div>
    </div>
    
  </div>

  <div class="container contentContainer" id="result" style="position: relative; top: -300px;">
      <div class="row" class="center">
        <h1 class="center  title">Results</h1>
  </div>

<?php
    if(isset($_GET['submit'])){


    $query = $_GET['query'];

    $raw_results = mysqli_query($con,"SELECT * FROM list WHERE string = '$query' ");

        if(mysqli_num_rows($raw_results)==0)
          echo "No Results Found";
        else
        {
          while($row=mysqli_fetch_array($raw_results)){


                   $a = $row['1'];
                   $b = $row['2'];
                   $c = $row['3'];
                   $d = $row['4'];
                   $e = $row['5'];

                   $arr2=array();

                   $arr = array("first.txt"=>$a,"second.txt"=>$b,"third.txt"=>$c,"fourth.txt"=>$d,"fifth.txt"=>$e);


                    arsort($arr);
        foreach ($arr as $key => $value) {
              array_push($arr2, $key);
              array_push($arr2,$value);

        }

?>


<div class="container">
  <center> <h2>Word Search</h2> </center>
              
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Rank</th>
        <th>Document</th>
        <th>Frequency</th>
      </tr>
    </thead>s
    <tbody>
      <tr> 
        <td>1</td>
        <td><?php echo $arr2[0];?></td>
        <td><?php echo $arr2[1];?></td>
      </tr>
      <tr>
        <td>2</td>
        <td><?php echo $arr2[2];?></td>
        <td><?php echo $arr2[3];?></td>
      </tr>
      <tr>
        <td>3</td>
        <td><?php echo $arr2[4];?></td>
        <td><?php echo $arr2[5];?></td>
      </tr>
      <tr>
        <td>4</td>
        <td><?php echo $arr2[6];?></td>
        <td><?php echo $arr2[7];?></td>
      </tr>
      <tr>
        <td>5</td>
        <td><?php echo $arr2[8];?></td>
        <td><?php echo $arr2[9];?></td>
      </tr>
    </tbody>
  </table>
</div>

<?php

            }
          }
        }

?>      


  </div>  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(".contentContainer").css("min-height",$(window).height());
    </script>
  </body>
</html>