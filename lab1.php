<?php
  session_start();
  if(!isset($_SESSION['values'])) {
    $_SESSION['values'] = array();
  }

  $result = "";

  function determine_quadrant($x, $y, $r) {
    global $result;
    if($x > 0 and $y > 0) {
      check_if_inside_sector($x, $y, $r);
    } else if($x < 0 and $y > 0) {
      check_if_inside_triangle($x, $y, $r);
    } else if($x < 0 and $y < 0) {
      $result =  "Not inside the area.";
    } else {
      check_if_inside_rectangle($x, $y, $r);
    }
  }

  function check_if_inside_sector($x, $y, $r) {
    global $result;
    if(sqrt($x*$x+$y*$y)<$r)
    $result = "Inside sector";
    else $result = "Outside the sector";

    return(false);
  }

  function check_if_inside_triangle($x, $y, $r) {
    global $result;
    if($x>=($r/2) * $y-$r)
    $result = "Inside triangle";
    else $result = "Outside the triangle";
    return true;
  }

  function check_if_inside_rectangle($x, $y, $r) {
    global $result;
    if($x<=$r/2.0 and $y>=-$r) 
    $result = "Inside rectangle";
    else $result = "Outside the rectangle";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PIA Lab I</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
  
</head>

<body>
  <table id="table" border="0">
    <?php
    //sleep(10);
     
      if (isset($_POST['x'])) { 
      determine_quadrant($_POST['x'], $_POST['y'], $_POST['r']);
      }
    
    ?>
          <form method="POST">

    <tr >
      <th scope="col">Petar D. Georgiev</th>
      <th scope="col">Group P3217</th>
      <th scope="col">Variant 28703</th>
    </tr>
    <tr>
      <th colspan="3" scope="row">
          <input id="x" name="x" type="text" placeholder="X" onblur="checkX(this.value)" >
      </th>    
    </tr>

    <tr>
      <th colspan="3" scope="row">
          <input id="y" name="y" type="text" placeholder="Y" onblur="checkY(this.value)" >
      </th>    
    </tr>

    <tr>
      <th colspan="3" scope="row">
      <input id="r" name="r" type="text" placeholder="R" onblur="checkR(this.value)">
      </th>    
    </tr>
    
    <tr>
      <th colspan="3" scope="row">
      <input id="submit" name="Check" type="submit">
      </th>    
    </tr>
  
    <tr>
      <th colspan="3" scope="row">Result: <?php echo $result; ?>
      </th>    
    </tr>
    

     <tr>
      <th colspan="3" scope="row">
      <span id="datetime">
      <?php
          global $result;

          if (isset($_POST['x'])) { 
            date_default_timezone_set('Europe/Moscow');
            echo date("h:i:sa");
            $executionTime = round(microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"],5);
            array_push($_SESSION['values'], array("x" => $_POST['x'], "y" => $_POST['y'], "r" => $_POST['r'], 
            "result" => $result, "time" => date("h:i:sa"), "exectime" => $executionTime));
            echo "\nExec: $executionTime";
          }
        ?>
         </span>
      </th>    
    </tr> 

    <tr >
    <th></th>
      <th scope="row">Программирование интернет-приложений 2018 г.</th>
      
    </tr>
  </table>
  </form>

<img id="pic" src="img/areas.png" width="550" height="350"/>

<?php
 
              if (isset($_SESSION['values'])) {
                ?>
  <table id="table1" border="1" style="display:">
          <tr>
            <th>X</th>
            <th>Y</th>
            <th>R</th>
            <th>Result</th>
            <th>Time</th>
            <th>ExecTime</th>
          </tr>

          <?php
            if(count($_SESSION['values']) == 0) {
          ?>
              <tr>
                <th colspan="6">No results to display.</td>
              </tr>
          <?php
            }
          ?>

          <?php
            foreach($_SESSION['values'] as $value) {
          ?>
           <tr>
            <th scope = "row">
            <?php


                echo $value['x'];
            ?> 
            </th>
            <th scope = "row">
            <?php


                echo $value['y'];
            ?> 
            </th>

            <th scope = "row">
            <?php


                echo $value['r'];
            ?> 
            </th>

            <th scope = "row">
            <?php


                echo $value['result'];
            ?> 
            </th>

            <th scope = "row">
            <?php


                echo $value['time'];
            ?> 
            </th>

            <th scope = "row">
            <?php


                echo $value['exectime'];
            ?> 
            </th>
            <tr>

              <?php
            }
          ?>

          <?php
            if(count($_SESSION['values']) > 0) {
          ?>
              <tr height = "50">
                <th colspan="6"><a id="clear" href="logout.php"><input value="Clear Results" type="button"></a></td>
              </tr>
          <?php
            }
          ?>
  </table>
            
  <?php
              }
  ?>
            
</body>
</html>
