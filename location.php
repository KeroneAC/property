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
    $address1 ="";
    $address2 ="";
    $city ="";
    $parish ="";
    $img ="";
    
    $address1Err ="*";
    $address2Err ="*";
    $cityErr ="*";
    $imgErr ="*";

    
    


    
  }
  $title="Location";
  $style='';
  include 'template.php';

  ?>





  <div class="container">
    <h1 class="well">Location</h1>
    <div class="col-lg-12 well">
      <div class="row">
        <form action = "locatevalid.php" enctype="multipart/form-data" id="locatform" method ="POST">
          <div class="col-sm-12">       
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
                <input value="<?php echo $city ?>" name="city" type="text" placeholder="Enter City Here.." class="form-control">
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

            <button type="submit" name="locatSubmit" class="btn btn-lg btn-info">Submit</button>         
          </div>
        </form> 
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>