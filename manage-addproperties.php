<?php

$title="Admin add properties";
   $style='<link href="css/editpstyle.css" rel="stylesheet" type="text/css">';
  include 'template.php';
  include_once 'includes/config.php';




if((isset($_SESSION['errFlag']))) //if the session error flag exist and is equal to 1
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
    $property ="";
    $bedroom = 0;
    $bathroom = 0;
    $size = "";
    $Btype = "";
    $Ltype = "";
    $price = "";
	
	
	$address1 ="";
    $address2 ="";
    $city ="";
    $parish ="";
    $img ="";
  
    $sizeErr ="*";
    $bedroomErr="*";
    $bathroomErr="*";
    $priceErr="*";

     $address1Err ="*";
    $address2Err ="*";
    $cityErr ="*";
    $imgErr ="*";
  }  
  
  ?>
  
  <div class="container">
      
	  <div class="col-md-12 well">
	  
	  <div class="row justify-content-center">
     <h3 class="text-center text-info">Add New Property</h3>
      <form action = "manage-addvalid.php" enctype="multipart/form-data" id="addproperties" method ="POST">
			 
			 
			 <div class="form-group">
			 <label>Select User</label>
			<select name ="userid" id="userid">
			<option value="idUSERS">   </option>
			<?php
			
			$records =mysqli_query($conn,"SELECT * FROM users");
			//$row = mysqli_num_rows($sql);
			while ($row = mysqli_fetch_array($records)){
				echo '<option value="'.$row['userid'].'">'.$row['username'].'</option>';
			
			
			}
			?>
			</select>
			</div>
			 
			<div class=" col-sm-5 form-group">
              <label>Type of Property</label>
               <select class="form-control" placeholder="Select type of property" id="property" name="property" onchange="populate(this.id,'Btype')">
                  <option <?php if ($property == "vacant lot") { echo "selected";} ?> value="vacant lot">Vacant Lot</option>
                  <option <?php if ($property == "residential") { echo "selected";} ?> value="residential">Residential</option>
                  <option <?php if ($property == "commercial") { echo "selected";} ?> value="commercial">Commercial</option>
                  
                </select>
              </div>   
              <div class="col-sm-3 form-group">
                <label># of Bedrooms</label> <label class="error"><?php echo $bedroomErr ?></label>
                <input type="number" min=0 placeholder="Enter # of Bedrooms Here.." name="bedroom" class="form-control" value="<?php echo $bedroom;?>">
              </div>  
              <div class="col-sm-3 form-group">
                <label># of Bathrooms</label> <label class="error"><?php echo $bathroomErr ?></label>
                <input type="number" min=0 placeholder="Enter # of Bathrooms Here.." name="bathroom" class="form-control" value="<?php echo $bathroom;?>">
              </div>   
            </div> 


            <div class="form-group">
              <label>Size of land (acres)</label> <label class="error"><?php echo $sizeErr ?></label>
              <input type="number" min=0.1 step=0.1 placeholder="Enter Size of land Here.." name="size" class="form-control" value="<?php echo $size; ?>" >
            </div> 
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Building Type</label>
                <select class="form-control" id="Btype" name="Btype">
      
                </select>
				
              </div> 
              <div class="col-sm-6 form-group">
                <label>Listing Type</label>
                <select class="form-control" name="Ltype" >
                  <option <?php if ($Ltype == "rent") { echo "selected";} ?> value="rent">Rent</option>
                  <option <?php if ($Ltype == "purchase") { echo "selected";} ?> value="purchase">Purchase</option>
                  <option <?php if ($Ltype == "lease") { echo "selected";} ?> value="lease">Lease</option>

                </select>
              </div>  
            </div> 

            <div class="form-group">
              <label>Price (JA$)</label> <label class="error"><?php echo $priceErr ?></label>
              <input min="0.01" step="0.01"type="number" name="price"placeholder="Enter Price Here.." class="form-control" value="<?php echo $price ?>">
            </div>               
			  
			  <div class="form-group">
              <label>Address line 1</label> <label class="error"> <?php echo $address1Err ?></label>
              <input value="<?php echo $address1 ?>" name="address1" type="text" placeholder="Enter Address line 1 Here.." class="form-control">
            </div>    
            <div class="form-group">
              <label>Address line 2</label> <label class="error"> <?php echo $address2Err ?></label>
              <input value="<?php echo $address2 ?>" name="address2" type="text" placeholder="Enter Address line 2 Here.." class="form-control">
            </div> 
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>City</label> <label class="error"> <?php echo $cityErr ?></label>
                <input value="<?php echo $city ?>" name="city" type="text" placeholder="Enter Designation Here.." class="form-control">
              </div>    
              <div class="col-sm-6 form-group">
                <label>Parish</label>
                <select name="parish" class="form-control" id="ParishSelect">
                  <option <?php if ($parish == "clarendon") { echo "selected";} ?> value="clarendon">Clarendon</option>
                  <option <?php if ($parish == "hanover") { echo "selected";} ?> value="hanover">Hanover</option>
                  <option <?php if ($parish == "kingston") { echo "selected";} ?> value="kingston">Kingston</option>
                  <option <?php if ($parish == "manchester") { echo "selected";} ?> value="manchester">Manchester</option>
                  <option <?php if ($parish == "portland") { echo "selected";} ?> value="portland">Portland</option>
                  <option <?php if ($parish == "st andrew") { echo "selected";} ?> value="st andrew">St Andrew</option>
                  <option <?php if ($parish == "st. ann") { echo "selected";} ?> value="st ann">St Ann</option>
                  <option <?php if ($parish == "st catherin") { echo "selected";} ?> value="st catherine">St Catherine</option>
                  <option <?php if ($parish == "st elizabeth") { echo "selected";} ?> value="st elizabeth">St Elizabeth</option>
                  <option <?php if ($parish == "st mary") { echo "selected";} ?> value="st mary">St Mary</option>
                  <option <?php if ($parish == "st thomas") { echo "selected";} ?> value="st thomas">St Thomas</option>
                  <option <?php if ($parish == "st james") { echo "selected";} ?> value="st james">St James</option>
                  <option <?php if ($parish == "trelawny") { echo "selected";} ?> value="trelawny">Trelawny</option>
                  <option <?php if ($parish == "westmoreland") { echo "selected";} ?> value="westmoreland">Westmoreland</option>
                </select>
              </div>  
            </div>

            <label>Upload Preview Photo</label><label class="error"> <?php echo $imgErr; ?> </label> <br>
          <input type = "file" name = "img" id = "img" value = <?php echo $img; ?>/></br>
			  
			<div class = "form-group">
		 <button type ="submit" name ="btnAdd" class="btn btn-primary btn-block"> Add Property </button>
		 </div>
		
		  </form>
		  </div>
		  
		  
	<script>
	function populate(id1,id2){


      var list1 = document.getElementById(id1);
      var list2 = document.getElementById(id2);
      var sel = "<?php echo $Btype?>" //set variable to currently selected building type

      list2.innerHTML = "";//clears options before adding 

      if(list1.value == "vacant lot"){ //checks for option

        var optionArray = ["n/a | N/A"]; //there can not be a building type without a building ie vacant lot

      } else {
        //creates array of values and labels
        var optionArray = ["housing|Housing","apartment|Apartment","town house|Town House","office space|Office space"];
      }

      for(var option in optionArray){//loop to add option for each pair in array

        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.id = pair[0];
        newOption.innerHTML = pair[1];
        list2.options.add(newOption);

        if(sel == pair[0]){//preserve whichever option was selected

          document.getElementById(pair[0]).selected = true;
        }


      }

    }
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>