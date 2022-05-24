<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td{
            border: 1px solid;
            width: 120px;
            
        }

        h2{ color: green;
            padding: 40px;
            text-align: center;
            font-family: Arial;
            font-size: 30px
        }
        a{
            color: blue;
        }
        thead{
            color: white;
            background-color: darkorange;
            font-size:25px;
            font-family: cursive;
        }
        body{
            background-color: darkturquoise;
        }
        input{
            width: 100%;
        }
        table {
  width: 100%;
}

th {
  height: 70px;
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
                        <h2 class="pull-left">INDIVIDUAL DETAILS</h2>
                        <a style="color:blue"; style="background-color:blue"; href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i><b>Add New</b></a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM employees";
                    if($result = $mysqli->query($sql)){
                        if($result->num_rows > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>S/N</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Address</th>";
                                        echo "<th>Salary</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['salary'] . "</td>";
                                        echo "<td>";
                                           // echo '<a style="color:green"; href="read.php?id='. $row['id'] .'" class="mr-3" title="View //Record" data-toggle="tooltip"><span class="fa fa-eye"></span> view</a>';
                                            echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></ span><br>update</a>';
                                            echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="btn btn-danger" href="#"></span><br>delete</a>';
                                            
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
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