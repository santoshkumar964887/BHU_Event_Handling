<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../css/select.css" style="text/css" rel="stylesheet"/>
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: url('../images/reg.jpg');
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment:fixed;
}

* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    margin-left: 20%;
    margin-right: 20%;
    padding: 16px;
    width: 60%;
    background: rgba(0,0,0,.5);
    color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: #f1f1f1;
    text-align: center;
}
</style>
</head>

<body>

<form action="reg.php" method="post">
  <div class="container">
    <h1>Register Yourself !!</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="college"><b>College Name</b></label>
    <input type="text" placeholder="Enter College" name="college" required>

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Enter Contact" name="contact" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw_repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw_repeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn" name="submit">Register</button>
  </div>
  
  <div class="container signin">
    <p style="color: black;">Already have an account? <a href="#">Login</a>.</p>
  </div>
</form>



<script>
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>


</body>
</html>
<?php
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'signup');

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $college=$_POST['college'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $psw=$_POST['psw'];
  $psw_repeat=$_POST['psw_repeat'];
  if ($name=='') {
    echo "<script> alert('Enter your name')</script>";
  }
  if ($college=='') {
    echo "<script> alert('Enter your colage')</script>";
  }
  if ($contact=='') {
    echo "<script> alert('Enter your contact')</script>";
  }
  if ($email=='') {
    echo "<script> alert('Enter your email')</script>";
  }
  if ($psw=='') {
    echo "<script> alert('Enter your psw')</script>";
  }
  
    else{
      $query="insert into student( name,college,contact,email,psw ) values('$name','$college','$contact','$email','$psw')";
      if (mysqli_query($con,$query)) {
        echo "<script> alert('you are Successfully Registered ')</script>";
        echo "<script>windo.open('reg.php','_self')</script>";
      }

    }

  }

?>