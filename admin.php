<?php
include_once('junk.php');
$que="SELECT * FROM `customer`";
$result = mysqli_query($db, $que);
$que1="SELECT * FROM `finance`";
$result1 = mysqli_query($db, $que1);
$que2="SELECT * FROM `places`";
$result2 = mysqli_query($db, $que2);
$que3="SELECT * FROM `rsrchdev`";
$result3 = mysqli_query($db, $que3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Page</title>
    <style>
body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
}

.main {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #2c3e50;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    color: #ffffff; 
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
	font-family: 'Roboto', sans-serif;
}

.main ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.main ul li {
    margin-left: 20px;
}

.main ul li a {
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.main ul li a:hover {
    color: #cccccc;
}

.sidebar {
    height: 100vh;
    width: 220px;
    background-color: #343a40;
    position: fixed;
    overflow-y: auto;
}

.sidebar a {
    padding: 16px 20px;
    text-decoration: none;
    font-size: 16px;
    color: #ffffff;
    display: block;
    transition: background-color 0.3s ease;
}

.sidebar a:hover {
    background-color: #575d63;
}

.content {
    margin-left: 240px;
    padding: 20px;
}

.container {
    max-width: 900px;
}

.card {
    background-color: #ffffff;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

@media (max-width: 992px) {
    .content {
        margin-left: 0;
    }
    .sidebar {
        width: 100%;
        position: static;
        height: auto;
        overflow: hidden;
    }
}

    </style>
</head>
<body>
    <div class="main">
        <h3 class="text-white ml-3">Admin Page</h3>
		<p id="datetime"></p>
        <ul class="list2">
		<li><a href="index.html" onclick="logout()">Logout</a></li>
    </div>
    <div class="sidebar">
        <a href="#" id="a1" onclick="myFunction(this)">Customers</a>
        <a href="#" id="a2" onclick="myFunction(this)">Finance</a>
        <a href="#" id="a3" onclick="myFunction(this)">Places</a>
        <a href="#" id="a6" onclick="myFunction(this)">Research & Development</a>
        <a href="#" id="a5" onclick="myFunction(this)">Add Place Information</a>
        <a href="#" id="a4" onclick="myFunction(this)">Back</a>
    </div>
    <div class="content">
        <div class="container mt-5">
            <div class="customer-workspace work" id="id1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Operations</h5>
                        <button type="button" id="v1" onclick="showDetails(this)" class="btn btn-info">View Customer Details</button>
                    </div>
                </div>
                <div id="tb-container" style="display: none; margin-top: 20px;">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="6"><h2>Customer Details</h2></th>
                            </tr>
                            <tr>
                                <th>Id</th>
                                <th>First name</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            while($rows = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $rows['id']; ?></td>
                            <td><?php echo $rows['fname']; ?></td>
                            <td><?php echo $rows['password']; ?></td>
                            <td><?php echo $rows['email']; ?></td>
                            <td><?php echo $rows['city']; ?></td>
                            <td><?php echo $rows['phone']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="delete-form" id="del-form">
                    <form method="POST" action="admin_op.php" class="form-group">     
                        <input type="text" name="id" placeholder="Customer ID" required class="form-control"><br>
                        <input type="text" name="fname" placeholder="First Name" required class="form-control"><br>
                        <input type="submit" value="Remove" class="btn btn-danger" name="de-submit-c">
                    </form>
                </div>
            </div>
            <div class="agent-workspace work" id="id2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Finance Operations</h5>
                        <button type="button" id="v3" onclick="showDetails(this)" class="btn btn-info">View Employee Details</button>
                    </div>
                </div>
                <div id="agent-container" style="display: none; margin-top: 20px;">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="3"><h2>Employee Details</h2></th>
                            </tr>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            while($rows1 = mysqli_fetch_assoc($result1)) {
                        ?>
                        <tr>
                            <td><?php echo $rows1['fid']; ?></td>
                            <td><?php echo $rows1['ffname']; ?></td>
                            <td><?php echo $rows1['fpassword']; ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="insert-form" id="ins-form">
                    <form method="POST" action="admin_op.php" class="form-group">
                        <input type="text" name="fid" placeholder="Employee ID" required class="form-control"><br>
                        <input type="text" name="ffname" placeholder="Employee Name" required class="form-control"><br>
                        <input type="text" name="fpassword" placeholder="Password" required class="form-control"><br>
                        <input type="submit" value="Insert" class="btn btn-success" name="in-submit-a">
                    </form>
                </div>
                <div class="delete-form" id="del-form2">
                    <form method="POST" action="admin_op.php" class="form-group">     
                        <input type="text" name="fid" placeholder="Employee ID" required class="form-control"><br>
                        <input type="text" name="ffname" placeholder="Employee Name" required class="form-control"><br>
                        <input type="submit" value="Remove" class="btn btn-danger" name="de-submit-a">
                    </form>
                </div>
            </div>
            <div class="places-workspace work" id="id3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Place Operations</h5>
                        <button type="button" id="v5" onclick="showDetails(this)" class="btn btn-info">View Place Details</button>
                    </div>
                </div>
                <div id="place-container" style="display: none; margin-top: 20px;">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="3"><h2>Place Details</h2></th>
                            </tr>
                            <tr>
                                <th>Id</th>
                                <th>Place Name</th>
                                <th>City</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            while($rows2 = mysqli_fetch_assoc($result2)) {
                        ?>
                        <tr>
                            <td><?php echo $rows2['pid']; ?></td>
                            <td><?php echo $rows2['pname']; ?></td>
                            <td><?php echo $rows2['pcity']; ?></td>
                        </tr>
                        <?php
						}
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="insert-form" id="ins-form2">
                    <form method="POST" action="admin_op.php" class="form-group">     
                        <input type="text" name="pid" placeholder="Place ID" required class="form-control"><br>
                        <input type="text" name="pname" placeholder="Place Name" required class="form-control"><br>
                        <input type="text" name="pcity" placeholder="City" required class="form-control"><br>
                        <input type="submit" value="Insert" class="btn btn-success" name="ins-submit-p">
                    </form>
                </div>
                <div class="delete-form" id="del-form3">
                    <form method="POST" action="admin_op.php" class="form-group">     
                        <input type="text" name="pid" placeholder="Place ID" required class="form-control"><br>
                        <input type="text" name="pname" placeholder="Place Name" required class="form-control"><br>
                        <input type="submit" value="Remove" class="btn btn-danger" name="de-submit-p">
                    </form>
                </div>
            </div>
			<div class="rsrch-workspace work" id="id6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ResearchDev Operations</h5>
                        <button type="button" id="v4" onclick="showDetails(this)" class="btn btn-info">View Employee Details</button>
                    </div>
                </div>
                <div id="rsrch-container" style="display: none; margin-top: 20px;">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="3"><h2>Employee Details</h2></th>
                            </tr>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Password</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php
                            while($rows3 = mysqli_fetch_assoc($result3)) {
                        ?>
                        <tr>
                            <td><?php echo $rows3['rid']; ?></td>
                            <td><?php echo $rows3['rname']; ?></td>
                            <td><?php echo $rows3['password']; ?></td>
                        </tr>
                        <?php
						}
						?>
                        </tbody>
                    </table>
                </div>
                <div class="insert-form" id="ins-form">
                    <form method="POST" action="admin_op.php" class="form-group">
                        <input type="text" name="rid" placeholder="Employee ID" required class="form-control"><br>
                        <input type="text" name="rname" placeholder="Employee Name" required class="form-control"><br>
                        <input type="text" name="password" placeholder="Password" required class="form-control"><br>
                        <input type="submit" value="Insert" class="btn btn-success" name="in-submit-a">
                    </form>
                </div>
                <div class="delete-form" id="del-form2">
                    <form method="POST" action="admin_op.php" class="form-group">     
                        <input type="text" name="rid" placeholder="Employee ID" required class="form-control"><br>
                        <input type="text" name="rname" placeholder="Employee Name" required class="form-control"><br>
                        <input type="submit" value="Remove" class="btn btn-danger" name="de-submit-a">
                    </form>
                </div>
            </div>
            <div class="add-place-info-workspace work" id="id5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Place Information</h5>
                        <form method="POST" action="add_place_info.php" class="form-group">
                            <input type="text" name="place_name" placeholder="Place Name" required class="form-control"><br>
                            <input type="text" name="place_location" placeholder="Location" required class="form-control"><br>
                            <textarea name="place_description" placeholder="Description" required class="form-control"></textarea><br>
                            <input type="submit" value="Add Place" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction(x) {
    var id = x.id;
    var workspaceId;
    switch (id) {
        case 'a1':
            workspaceId = 'id1';
            break;
        case 'a2':
            workspaceId = 'id2';
            break;
        case 'a3':
            workspaceId = 'id3';
            break;
        case 'a6':
            workspaceId = 'id6'; 
            break;
        case 'a5':
            workspaceId = 'id5';
            break;
        default:
            break;
    }

    var workspaces = document.getElementsByClassName("work");
    for (var i = 0; i < workspaces.length; i++) {
        workspaces[i].style.display = "none";
    }
    document.getElementById(workspaceId).style.display = "block";
}


        function showDetails(button) {
            var btnId = button.id;
            if (btnId === "v1") {
                document.getElementById("tb-container").style.display = "block";
            } else if (btnId === "v3") {
                document.getElementById("agent-container").style.display = "block";
            } else if (btnId === "v4") {
				document.getElementById("rsrch-container").style.display = "block";
            } else if (btnId === "v5") {
                document.getElementById("place-container").style.display = "block";
            }
        }
		function getCurrentDateTime() {
            var currentDateTime = new Date();
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
            return currentDateTime.toLocaleString('en-US', options);
        }

        function updateDateTime() {
            var datetimeElement = document.getElementById('datetime');
            datetimeElement.textContent = getCurrentDateTime();
        }
        setInterval(updateDateTime, 1000);

		function logout() {
    if (confirm("Are you sure you want to logout?")) {
        alert("Logged out successfully!");
        window.location.href = "index.html";
    } else {
        console.log("User cancelled logout");
        alert("Logout cancelled!");
    }
}

    </script>
</body>
</html>
