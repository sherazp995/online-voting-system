<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin/home.php');
}

if (isset($_SESSION['voter'])) {
    header('location: home.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition">
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        html {
            height: 100%;
        }

        body {
            background-image: url("includes/voting.jpg") !important;
            position: relative;
            height: 100%;
            width: 100%;
            /* background-size: 100vw 100vh; */
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        img {
            height: 100vh;
        }

        .main {
            color: black;
            position: absolute;
            right: 0px;
            display: flex;
            height: 100vh;
            width: 50vw;
            justify-content: center;
            align-items: center;
        }
    </style>
    <main class="main">
        <div>
            <h3>
                <!-- WBOVS stands for Web Based Online Voting System -->
                <h3>Web Based Online Voting System</h3>
            </h3>
            <hr>

            <h2 class="text-center">Registration</h2>
            <form method="POST" action="register.php" enctype="multipart/form-data" class="d-flex justify-content-center flex-column">
                <div>
                    <label for="cnic" class="form-label h5">CNIC</label>
                    <input type="text" class="form-control" id="cnic" name="cnic" placeholder="CNIC Without Dashes"  maxlength="13" required>
                </div>
                <div>
                    <label for="firstname" class="form-label h5">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>
                </div>
                <div>
                    <label for="lastname" class="form-label h5">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" required>
                </div>
                <div>
                    <label for="password" class="form-label h5">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <div>
                    <label for="confirm-password" class="form-label h5">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm-password" id="confirm-password" placeholder="Confirm Password" onkeyup="validate_password()" required>
                </div>
                <span id="wrong_pass_alert"></span>
                <div id="upload" style="width: 30%">
                    <label for="photo" class="form-label h-5">Upload image: </label>
                    <input type="file" class="form-control-file" id="photo" name="photo">
                </div><br>
                <button class="btn btn-primary mt-2" onclick="wrong_pass_alert()" type="submit" id="create" name="register">Register</button><br />
                <h5>Already user? <a href="index.php">Login here</a></h5>
            </form>
        </div>
    </main>
    <?php
    if (isset($_SESSION['error'])) {
        echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo "
  				<div class='callout callout-info text-center mt20'>
			  		<p>" . $_SESSION['success'] . "</p> 
			  	</div>
  			";
        unset($_SESSION['success']);
    }
    ?>
    <!-- </div> -->
    <script>
        function validate_password() {
 
 var pass = document.getElementById('password').value;
 var confirm_pass = document.getElementById('confirm-password').value;
 if (pass != confirm_pass) {
     document.getElementById('wrong_pass_alert').style.color = 'red';
     document.getElementById('wrong_pass_alert').innerHTML
       = '☒ Use same password';
     document.getElementById('create').disabled = true;
     document.getElementById('create').style.opacity = (0.4);
 } else {
     document.getElementById('wrong_pass_alert').style.color = 'green';
     document.getElementById('wrong_pass_alert').innerHTML =
         '🗹 Password Matched';
     document.getElementById('create').disabled = false;
     document.getElementById('create').style.opacity = (1);
 }
}

function wrong_pass_alert() {
            if (document.getElementById('pass').value != "" &&
                document.getElementById('confirm_pass').value != "") {
            } else {
                alert("Please fill all the fields");
                event.preventDefault()
            }
        }
    </script>
    <?php include 'includes/voters_modal.php'; ?>

    <?php include 'includes/scripts.php' ?>
</body>