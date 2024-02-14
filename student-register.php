<?php
$pageTitle = "Student Registration Form";
require_once 'header.php';

session_start();

    // Check if form data is available in the session
    isset($_SESSION["form_data"]) ? $form_data = $_SESSION["form_data"] : $form_data = [];
    isset($_SESSION["error_message"]) ? $err_msg = $_SESSION["error_message"] : $err_msg = [];
?>

<h2>Student Registration Form</h2>
<form action="register.php" method="post" id="studentRegistrationForm">
    <div class="mb-3">
        <label for="firstname" class="form-label">Firstname</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo isset($form_data['firstname']) ? $form_data['firstname'] : ''; ?>" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Lastname</label>
        <input type="text" class="form-control" id="lastname" value="<?php echo isset($form_data['lastname']) ? $form_data['lastname'] : ''; ?>" name="lastname" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" value="<?php echo isset($form_data['email']) ? $form_data['email'] : ''; ?>" name="email" required>
        <?php
            if (isset($err_msg['uniqueEmailError'])) {
                echo '<p style="color: red;">Email is already in use. Please use other email to register.</p>';
            }
        ?>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
            <option value="">-- Select Option --</option>
            <option value="M" <?php if(isset($form_data['gender'])) { echo ($form_data['gender'] == 'M') ? "selected" : ""; } ?>>Male</option>
            <option value="F"<?php if(isset($form_data['gender'])) { echo ($form_data['gender'] == 'F') ? "selected" : ""; } ?>>Female</option>
            <option value="O"<?php if(isset($form_data['gender'])) { echo ($form_data['gender'] == 'O') ? "selected" : ""; } ?>>Others</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    <a href="index.php" class="btn btn-warning btn-sm">Back</a>
</form>

<?php
    // Clear the session data after displaying it
    unset($_SESSION["form_data"]);
    unset($_SESSION["error_message"]);
    require_once 'footer.php';
?>