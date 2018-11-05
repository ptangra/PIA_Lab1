<?php
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
  <table border="0">
    <?php
      if (isset($_POST['x']) { 
      determine_quadrant($_POST['x'], $_POST['y'], $_POST['r']);
      }
    ?>
    
    <tr >
      <th scope="col">Petar D. Georgiev</th>
      <th scope="col">Group P3217</th>
      <th scope="col">Variant 28703</th>
    </tr>
    <tr>
    <th></th>
      <th scope="row">
        <form method="POST">
          <input id="x" name="x" type="text" placeholder="X" onblur="checkX(this.value)" >
          <input id="y" name="y" type="text" placeholder="Y" onblur="checkY(this.value)">
          <input id="r" name="r" type="text" placeholder="R" onblur="checkR(this.value)">
          <input id="submit" name="Check" type="submit" onblur="setTimeout(determine_quadrant,3000)">
          
        </form>
      </th>
      <th></th>
    </tr>
    <tr>
    <th></th>
      <th scope="col">Result: <?php echo $result; ?></th>
      <th>Exec:<span id="exec"></span></th>
    <th></th>
    </tr>
    <tr >
    <th></th>
      <th scope="row">Программирование интернет-приложений 2018 г.</th>
      <th scope="row">Time: <span id="datetime"></span></th>  
      <script>
        var dt = new Date();
document.getElementById("datetime").innerHTML = document.getElementById("datetime").innerHTML = 
        (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
      </script>
    </tr>
  </table>
</body>
<img id="pic" src="img/areas.png" width="450" height="350"/>
</html>