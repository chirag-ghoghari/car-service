<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
if ($_SESSION['usertype'] != 'admin') {
    header('Location: ../','');
}

require '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php require('sidebar.php') ?>
            <div class="col py-3">
                <div class="container">
                    <h1 class="text-center mt-5">Service Requests</h1>
                    <hr>
                    <div class="search mb-5 ">
                        <!-- <label for="search">Search here... </label>
                        <input type="text" name="" id="search" class="form-control w-25">
                        <hr> -->
                        <form action="" method="post">
                            <!--<label for="selct"> Select Column</label>
                            <select name="select_col" id="" class="form-control w-25">
                                <option value="">-- select --</option>
                                <option value="id">id</option>
                                <option value="oname">Owner Name</option>
                                <option value="vname">Car Name</option>
                                <option value="status">Status</option>
                            </select>-->
                            <div class="mt-3">
                                <!--<input type="submit" name="asce" value="Ascending" class="btn btn-primary">
                                <input type="submit" name="desc" value="Descending" class="btn btn-primary">-->
                                <input type="submit" name="All" value="All"  class="btn btn-primary" style="background-color:#00008B;">
                                <input type="submit" name="pending" value="Pending" class="btn btn-primary" style="background-color:#FFA500;">
                                <input type="submit" name="active" value="Active" class="btn btn-primary">
                                <input type="submit" name="done" value="Done" class="btn btn-primary" style="background-color:#008000;">
                                <input type="submit" name="cancelled" value="Cancel" class="btn btn-primary" style="background-color:#FF0000;">
                                
                            </div>
                        </form>

                    </div>
                    <div class="table-responsive text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>OWNER</th>
                                    <th>CONTECT No.</th>
                                    <th>ADDRESS</th>
                                    <th>CAR_NUMBER</th>
                                    <th>CAR_NAME</th>
                                    <th>SERVICES</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qry = "select * from service_request";
                                if (isset($_POST['asce'])) {
                                    if (isset($_POST['select_col'])) {
                                        $order_by = $_POST['select_col'];
                                    }
                                    $qry = "select * from service_request order by $order_by";
                                }
                                if (isset($_POST['desc'])) {
                                    if (isset($_POST['select_col'])) {
                                        $order_by = $_POST['select_col'];
                                    }
                                    $qry = "select * from service_request order by $order_by DESC";
                                }

                                if (isset($_POST['All'])) {
                                    // $order_by = isset($_POST['select_col']) ? $_POST['select_col'] : 'id'; // Default sorting by id if no column is selected
                                
                                    $qry = "select * from service_request";
                                    $result = mysqli_query($conn, $qry);
                                    if ($result) {
                                        // Proceed with displaying the pending data
                                    } else {
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                }

                                if (isset($_POST['pending'])) {
                                    // $order_by = isset($_POST['select_col']) ? $_POST['select_col'] : 'id'; // Default sorting by id if no column is selected
                                
                                    $qry = "SELECT * FROM service_request WHERE status = 0  ";
                                    $result = mysqli_query($conn, $qry);
                                    if ($result) {
                                        // Proceed with displaying the pending data
                                    } else {
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                }
                                if (isset($_POST['done'])) {
                                    // Construct SQL query to select active data (status = 1)
                                    $qry = "SELECT * FROM service_request WHERE status = 1";
                                
                                    // Execute the query
                                    $result = mysqli_query($conn, $qry);
                                
                                    // Check if the query executed successfully
                                    if ($result) {
                                        // Proceed with displaying the active data
                                    } else {
                                        // Display an error message if the query fails
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                }
                                if (isset($_POST['active'])) {
                                    // Construct SQL query to select active data (status = 1)
                                    $qry = "SELECT * FROM service_request WHERE status = 2";
                                
                                    // Execute the query
                                    $result = mysqli_query($conn, $qry);
                                
                                    // Check if the query executed successfully
                                    if ($result) {
                                        // Proceed with displaying the active data
                                    } else {
                                        // Display an error message if the query fails
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                }
                                if (isset($_POST['cancelled'])) {
                                    // Construct SQL query to select active data (status = 1)
                                    $qry = "SELECT * FROM service_request WHERE status = 3";
                                
                                    // Execute the query
                                    $result = mysqli_query($conn, $qry);
                                
                                    // Check if the query executed successfully
                                    if ($result) {
                                        // Proceed with displaying the active data
                                    } else {
                                        // Display an error message if the query fails
                                        echo "Error executing query: " . mysqli_error($conn);
                                    }
                                }

                                $result = mysqli_query($conn, $qry);
                                while ($r = mysqli_fetch_assoc($result)) :
                                ?>
                                    <tr class="bg-danger">
                                        <td><?php echo $r['id'] ?></td>
                                        <td><?php echo $r['oname'] ?></td>
                                        <td><?php echo $r['contact'] ?></td>
                                        <td><?php echo $r['address'] ?></td>
                                        <td><?php echo $r['vnumber'] ?></td>
                                        <td><?php echo $r['vname'] ?></td>
                                        <td><?php echo $r['services'] ?></td>
                                        <td>
                                            <span class="badge <?php
                                                                switch ($r['status']) {
                                                                    case 0:
                                                                        echo 'bg-warning';
                                                                        break;

                                                                    case 1:
                                                                        echo 'bg-success';
                                                                        break;

                                                                    case 2:
                                                                        echo 'bg-primary';
                                                                        break;

                                                                    case 3:
                                                                        echo 'bg-danger';
                                                                        break;
                                                                }

                                                                ?>">
                                                <?php
                                                switch ($r['status']) {
                                                    case 0:
                                                        echo 'Pending';
                                                        break;

                                                    case 1:
                                                        echo 'Done';
                                                        break;

                                                    case 2:
                                                        echo 'Active';
                                                        break;

                                                    case 3:
                                                        echo 'cancelled';
                                                        break;
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex column-gap-3">
                                            <a href="edit-request.php?id=<?php echo $r['id'] ?>" class="btn btn-outline-success">Edit</a>
                                            <a href="delete-request.php?id=<?php echo $r['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                            
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>