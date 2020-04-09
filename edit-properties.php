 <?php
  
  

  $title="My Properties";
  $style='<link href="css/editpstyle.css" rel="stylesheet" type="text/css">';
  include 'template.php';
  include_once 'includes/config.php';

 if (isset($_SESSION['idUSERS'])){

      $uid = $_SESSION['idUSERS'];

     
      //select property data
      $sql="SELECT * FROM property where userid = $uid";

        $stmt = mysqli_stmt_init($conn);

        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        
}
    

?>

<div class="container">
      <h1 class="well">All My Properties</h1>
     

        <!-- Webpage Content Starts here -->
        <div class="table-responsive" style="overflow-x:auto;">
          
          <table id="editable_table" class="table table-bordered table-striped">
            <thead>
              <tr>
                
                <th>ID</th>
                <th>Type</th>
                <th>Bedroom</th>
                <th>Bathroom</th>
                <th>Size</th>
                <th>Building</th>
                <th>Listing</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>City</th>
                <th>Parish</th>
                <th>Price</th>
                
              
               
              </tr>
            </thead>
            <tbody>
            <?php 
              while ($row = mysqli_fetch_assoc($result)){

                echo '<tr>
                        
                        <td>'.$row['idProperty'].'</td>
                        <td>'.$row['p_type'].'</td>
                        <td>'.$row['bedroom'].'</td>
                        <td>'.$row['bathroom'].'</td>
                        <td>'.$row['size'].'</td>
                        <td>'.$row['b_type'].'</td>
                        <td>'.$row['l_type'].'</td>
                        <td>'.$row['address1'].'</td>
                        <td>'.$row['address2'].'</td>
                        <td>'.$row['city'].'</td>
                        <td>'.$row['parish'].'</td>
                        <td>'.$row['price'].'</td>
                       

                      </tr>';
                


              }
            ?>
          </tbody>
          </table>

        </div>
        <!-- End of Webpage Content-->
      
    </div>
    <script>
      $(document).ready(function(){
        $('#editable_table').Tabledit({

          url:'action.php',
          columns:{
            identifier:[0, "idProperty"],
            editable:[[1,"p_type"], [2,"bedroom"], [3,"bathroom"], [4,"size"], [5,"b_type"], [6,"l_type"],[7,"address1"],[8,"address2"],[9,"city"],[10,"parish"],[11,"price"]]
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