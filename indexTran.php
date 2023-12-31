<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">machine details</h2>
                        <a href="addTran.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New transactions</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config1.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM transactions";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>xid_machinecode</th>";
                                        echo "<th>transaction__ref</th>";
                                       echo "<th>request_id</th>";
                                       echo "<th>transaction_code</th>";
                                       echo "<th>amount</th>";
                                        echo "<th>phone_number</th>";
                                        echo "<th>transactiondate</th>";
                                        echo "<th><status></th>";
                                       
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['xid_machinecode'] . "</td>";
                                        echo "<td>" . $row['transaction_ref'] . "</td>";
                                        echo "<td>" . $row['request_id'] . "</td>";
                                        echo "<td>" . $row['transaction_code'] . "</td>";
                                        echo "<td>" . $row['amount'] . "</td>";
                                        echo "<td>" . $row['phone_number'] . "</td>";
                                        echo "<td>" . $row['transactiondate'] . "</td>";
                                       // echo "<td>" . $row['status'] . "</td>";
                                       
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            $result->free();
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    $mysqli->close();
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>