<?php
$pageTitle = "Students List";
require_once 'header.php';
require_once 'config.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>	
	<div class="row">
		<div class="col-md-6">
    		<h2>Student List</h2>
    	</div>
    	<div class="col-md-6 d-flex justify-content-end align-items-center">
    		<a href="student-register.php" class="btn btn-success btn-md">Add Student</a>
    	</div>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"]." ".$row["lastname"] . "</td><td>" . $row["email"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No students found</td></tr>";
        }
        ?>
        </tbody>
    </table>

<?php
require_once 'footer.php';
?>