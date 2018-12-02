// function checkIfNumber(input) {
//     if (isNaN(input)) 
//     {
//       alert("Must input numbers");
//       document.getElementById("submit").disabled = true;
//       return false;
//     }
//     document.getElementById("submit").disabled = false;
//   }

  function validateInput() {
    var x = document.getElementById("x");
    var x_error = document.getElementById("x_error");

    var y = document.getElementById("y");
    var r = document.getElementById("r");

    var valid = true;
    var submit = document.getElementById("submit");

    if(x.value == "") {
      valid = false;
    } else {
      if(x.value > 3 || x.value < -5 || isNaN(x.value))
      {
        x_error.innerHTML = "Incorrect for X";
        x.value = "";

        valid = false;
      }
      else{
        x_error.innerHTML = ""; 
      }
    }

    if(y.value == "") {
      valid = false;
    } else {
      if(y.value > 3 || y.value < -3 || isNaN(y.value)){
        y_error.innerHTML = "Incorrect for Y";
        y.value = "";

        valid = false;
      }
      else{
        y_error.innerHTML = ""; 
      }
    }

    if(r.value == "") {
      valid = false
    } else {
      if(r.value > 5 || r.value < 2 || isNaN(r.value))
      {
        r_error.innerHTML = "Incorrect for R";
        r.value = "";

        valid = false;
      }
      else{
        r_error.innerHTML = ""; 
      }
    }

    if (valid){
      submit.disabled = false;
    }
    else {
      submit.disabled = true;
    }
  }
