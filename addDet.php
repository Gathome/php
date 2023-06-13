<?php

// PHP7 specific, fails fast, this file only 
declare(strict_types=1); 
// this file and all included/required files
   error_reporting(-1); 
   ini_set('display_errors', 'true');
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// remaining script goes here
// Include config file
require_once "config1.php";
 
// Define variables and initialize with empty values
$code = $milktemp = $milkvol = $oilvol = $mlat =$mlon = $machiner = "";
$code_err = $milk_err = $oil_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate code
    $input_code = trim($_POST["code"]);
    if(empty($input_code)){
        $code_err = "Please enter a code.";
  //  } elseif(!filter_var($input_code, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
     //   $code_err = "Please enter a valid code.";
        } 
    else{
        $code = $input_code;
    }
    
    // Validate milkprice
    $milk_price = trim($_POST["milktemp"]);
    if(empty($milk_price)){
        $milkprice_err = "Please enter an address.";     
    } else{
        $milktemp = $milk_price;
    }
    
    // Validate oilprice
    $oil_price= trim($_POST["milkvol"]);
    if(empty($oil_price)){
        $oil_err = "Please enter the salary amount.";     
   // } elseif(!ctype_digit($oil_price)){
     //   $oil_err = "Please enter a positive integer value.";
    } else{
        $milkvol = $oil_price;
    }
     // Validate oilvolume
     $oil_vol = trim($_POST["oilvolume"]);
     if(empty($oil_vol)){
         $milkprice_err = "Please enter an address.";     
     } else{
         $oilvol = $oil_vol;
    
    
    }

     // Validate machinelatitude
     $m_lat = trim($_POST["machinelatitude"]);
     if(empty($m_lat)){
         $milkprice_err = "Please enter an address.";     
     } else{
         $mlat= $m_lat;
     }
     
      // Validate longitude
    $m_lon = trim($_POST["machinelongitude"]);
    if(empty($m_lon)){
        $milkprice_err = "Please enter an address.";     
    } else{
        $mlon = $m_lon;
    }
    
     // Validate machinerent
     $mr = trim($_POST["machinerent"]);
     if(empty($mr)){
         $milkprice_err = "Please enter an address.";     
     } else{
         $machiner = $mr;
     }
    
      // Validate createdtime
  //  $milk_price = trim($_POST["milkprice"]);
    //if(empty($milk_price)){
      //  $milkprice_err = "Please enter an address.";     
    //} else{
      //  $milkprice = $milk_price;
    //}
    
     
    
    // Check input errors before inserting in database
    if(empty($code_err) && empty($milkprice_err) && empty($oilprice_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO machinedetails (machinecode, milktemp, milkvolume, oilvolume,
         machinelatitude, machinelongitude, machinerent)
          VALUES ( ?, ?, ?, ?, ?, ?, ?);";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("siiiddi", $code, $milktemp, $milkvol, 
            $oilvol, $mlat,$mlon, $machiner);
            
            // Set parameters
            //$param_code = $code;
            //$param_milkprice = $milkprice;
            //$param_oilprice = $oilprice;
            //$param_oilvol=$oilvol;
            //$param_mlat=$mlat;
            //$param_mlon=$mlon;
            //$param_machiner=$machiner;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: indexDet.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add price to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>code</label>
                            <input type="text" name="code" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $code; ?>">
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>milktemp</label>
                            <input type ="text" name="milktemp" class="form-control <?php echo (!empty($milkprice_err)) ? 'is-invalid' : ''; ?>"><?php echo $milktemp; ?>
                            <span class="invalid-feedback"><?php echo $milkprice_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>milk vol</label>
                            <input type="text" name="milkvol" class="form-control <?php echo (!empty($oilprice_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $milkvol; ?>">
                            <span class="invalid-feedback"><?php echo $oilprice_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>oilvolume</label>
                            <input type="text" name="oilvolume" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $oilvol; ?>">
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>machinelatitude</label>
                            <input type="text" name="machinelatitude" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mlat; ?>">
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>machinelongitude</label>
                            <input type="text" name="machinelongitude" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mlon; ?>">
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>machine rent</label>
                            <input type="text" name="machinerent" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $machiner; ?>">
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>
                       
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexDet.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>