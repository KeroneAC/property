<?php
   
  

  $title="Managment";
  $style='<link href="css/editpstyle.css" rel="stylesheet" type="text/css">';
  include 'template.php';
  include_once 'includes/config.php';
  
  if (isset($_SESSION['idUSERS'])){

      //$idU = $_SESSION['idUSERS'];

     
      //select user data
      $sql="SELECT * FROM users";

        $stmt = mysqli_stmt_init($conn);

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        
  }
if((isset($_SESSION['errFlag'])) && ($_SESSION['errFlag'])==1) //if the session error flag exist and is equal to 1
	{
		//var_dump($_SESSION);
		foreach($_SESSION as $key => $value)
		{
			$$key = $value;
		}
		
	}
	else
	{
		// DEFINE DEFAULT INFO on START UP
		$fname ="";
		$lname = "";
		$username = "";
		$telNum ="";
		$email = "";
		$password1 = "";
		$password2 = "";
		
	
		$fnameErr ="*";
		$lnameErr = "*";
		$usernameErr = "*";
		$telNumErr ="*";
		$emailErr = "*";
		$passwordErr = "*";
		
		
		
	}

  
?>

<div class="container">
      <h1 class="well">Accounts</h1>
		 <div class="col-md-12">
		 <br>
	  <h3 class="text-center text-info"> Saved User Records</h3>
	  <div class="table-responsive" style="overflow-x:auto;" >
	  
	   <table id="editable_table" class="table table-bordered table-striped">
	  <thead>
		<tr>
			<th> ID # </th>
			<th> Username</th>
			<th> First Name </th>
			<th> Last Name </th>
			<th> Phone Number </th>
			<th> Email</th>
		</tr>
	   </thead>
		<tbody>
		<?php
			while ($row = mysqli_fetch_assoc($result)) {
				echo '<tr>
				
						<td>'.$row['idUSERS'].'</td>
						<td>'.$row['username'].'</td>
						<td>'.$row['fname'].'</td>
						<td>'.$row['lname'].'</td>
						<td>'.$row['telnum'].'</td>
						<td>'.$row['email'].'</td>
						
					</tr>';
					
					
			}
			?>
			</tbody>
			</table>
	</div>

      <script>
      $(document).ready(function(){
        $('#editable_table').Tabledit({

          url:'manage-usersvalid.php',
          columns:{
            identifier:[0, "idUSERS"],
				editable:[[1,"username"], [2,"fname"], [3,"lname"], [4,"telnum"], [5,"email"]]
          },
          restoreButton:false,
          onSuccess:function(data, textStatus, jqXHR)
          {
            if(data.action == 'delete')
            {
              $('#'+data.id).remove();
            }
          }

        });

      });
      

    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>