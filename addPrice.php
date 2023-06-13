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
$code = $milkprice = $oilprice= "";
$code_err = $milk_err = $oil_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate machine code
    $code_name = trim($_POST["code"]);
    if(empty($code_name)){
        $code_err = "Please enter a code.";
    //} elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
      //  $name_err = "Please enter a valid name.";
    } else{
        $code = $code_name;
    }
    
    // Validate milk temperature
    $milk_temp = trim($_POST["milkprice"]);
    if(empty($milk_temp)){
        $milk_err = "Please enter an temp.";     
    } else{
        $milkprice = $milk_temp;
    }
    
    // Validate oil temperature
    $milk_vol = trim($_POST["oilprice"]);
    if(empty($milk_vol)){
        $oil_err = "Please enter the oil temp.";     
   // } elseif(!ctype_digit($oil_temp)){
        $oil_err = "Please enter a positive integer value.";
    } else{
        $oilprice= $milk_vol;
    }

   
  //  $oil_vol = trim($_POST["milktemperature"]);
    //if(empty($oil_vol)){
      //  $milk_err = "Please enter an temp.";     
    //} else{
      //  $oilprice = $oil_vol;
   // }
    
    // Check input errors before inserting in database
    if(empty($code_err) && empty($milk_err) && empty($oil_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO price (code, milkprice,oilprice) VALUES (?, ?, ?)";
 
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("iii", $code, $milkprice,$oilprice);
            
            // Set parameters
         //   $param_code = $code;
           // $param_milktemp = $milktemp;
            //$param_milkvol = $milkvol;
            //$param_oilvol=$oilvol;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: indexAdd.php");
            //    $stmt->close();
            //$mysqli->close();
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
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                       
                        <div class="form-group">
                            <label>machine code</label>
                            <input type="text" name="code" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>"value="<?php echo $code; ?>">
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>milkprice</label>
                            <input type="text" name="milkprice" class="form-control <?php echo (!empty($milk_err)) ? 'is-invalid' : ''; ?>"value="<?php echo $milkprice; ?>">
                            <span class="invalid-feedback"><?php echo $milk_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>oilprice</label>
                            <input type="text" name="oilprice" class="form-control <?php echo (!empty($oil_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $oilprice; ?>">
                            <span class="invalid-feedback"><?php echo $oil_err;?></span>
                        </div>

                 

                  
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="indexAdd.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>