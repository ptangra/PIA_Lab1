// function checkIfNumber(input) {
//     if (isNaN(input)) 
//     {
//       alert("Must input numbers");
//       document.getElementById("submit").disabled = true;
//       return false;
//     }
//     document.getElementById("submit").disabled = false;
//   }
  
  function checkX(input){
    if(input > 3 || input < -5 || isNaN(input))
    {
      alert("Incorrect for X");
      document.getElementById("submit").disabled = true;
      return false;
    }
    document.getElementById("submit").disabled = false;
  }

  function checkY(input){
    if(input > 3 || input < -3 || isNaN(input))
    {
      alert("Incorrect for Y");
      document.getElementById("submit").disabled = true;
      return false;
    }
    document.getElementById("submit").disabled = false;
  }

  function checkR(input){
    if(input > 5 || input < 2 || isNaN(input))
    {
      alert("Incorrect for R");
      document.getElementById("submit").disabled = true;
      return false;
    }
    document.getElementById("submit").disabled = false;
  }

