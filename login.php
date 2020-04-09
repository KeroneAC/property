<?php
  
  

  $title="Login";
  $style='<link href="css/loginstyle.css" rel="stylesheet" type="text/css">';
  include 'template.php';

  ?>

  
   <div class="wrapper">
    <form  action = "loginvalid.php" id="loginform" method ="POST" class="form-signin" >       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="loginUsername" placeholder="Username" required="" autofocus="" /><br>
      <input type="password" class="form-control" name="loginPassword" placeholder="Password" required=""/><br>      
      
      <button class="btn btn-lg btn-primary btn-block" name="loginSubmit" type="submit">Login</button>   
    </form>
  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>