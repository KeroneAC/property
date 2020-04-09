
<?php
   
  
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
    $property ="vacant lot";
    $bedroom = 0;
    $bathroom = 0;
    $size = "";
    $Btype = "";
    $Ltype = "";
    $price = "";
    
  
    $sizeErr ="*";
    $bedroomErr="*";
    $bathroomErr="*";
    $priceErr="*";
    


    
  }
  $title="Description";
  $style='';
  include 'template.php';

  ?>
  

    <div class="container">
      <h1 class="well">Description</h1>
      <div class="col-lg-12 well">
        <div class="row">
          <form action = "propertvalid.php" id="descform" method ="POST">
            <div class="col-sm-12">       
             <div class="row">
              <div class="col-sm-6 form-group">
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
                <select class="form-control" name="Btype" id="Btype">
      
                </select>
              </div> 
              <div class="col-sm-6 form-group">
                <label>Listing Type</label>
                <select class="form-control" name="Ltype" id="Ltype">
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


            <button type="submit" name="descSubmit" class="btn btn-lg btn-info">Submit</button>         
          </div>
        </form> 
        
      </div>
    </div>
  </div>

  <script>

    //populates the building type drop down list based on option selected in Type of property
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