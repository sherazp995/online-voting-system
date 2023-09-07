<?php
session_start();
if (isset($_SESSION['admin'])) {
  header('location: admin/home.php');
}

if (isset($_SESSION['voter'])) {
  header('location: home.php');
}
if (isset($_SESSION['register_id'])) {
  $voter = $_SESSION['register_id'];
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition"  onload="toggle_register()">

<?php
    if (isset($_SESSION['success'])) {
        echo "
  				<div class='callout callout-info text-center mt20'>
			  		<p>" . $_SESSION['success'] . "</p> 
			  	</div>
  			";
    }
    ?>
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
  <a href="#register_modal" data-toggle="modal" class="btn btn-default btn-flat d-none" id="registered_toggle">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</a>

  <div>
      <h3>
        Web Based Online Voting System
      </h3>
      <hr>

      <div>
        <h2 class="text-center">Login</h2>
        <form action="login.php" method="POST" class="d-flex justify-content-center flex-column">
          <div>
            <label for="voter" class="form-label h5">Voter ID</label>
            <input type="text" class="form-control" name="voter" placeholder="Voter's ID" required>
          </div>
          <div>
            <label for="password" class="form-label h5">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
          </div>
          <button id="loginbtn" class="btn btn-primary mt-2" type="submit" name="login">Login</button><br />
          <h5>New user? <a href="register_page.php">Register here</a></h5>
        </form>
      </div>
    </div>
  </main>
 
			<div class="modal fade" id="register_modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title h2"><?php echo $_SESSION['success'] ?></h4>
						</div>
						<div class="modal-body">
							<div id="register_body">
								<div class="text-center lead">Your Voters ID is <strong class="ms-4"><?php echo $voter ?></strong></div>
								<div class="text-center lead">You can use this ID after fifteen minutes (15) reviewd by admin as security purpose to login</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
						</div>
					</div>
				</div>
			</div>
  <?php
  if (isset($_SESSION['error'])) {
    echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
    unset($_SESSION['error']);
  }
  ?>

  <?php include 'includes/voters_modal.php'; ?>

  <?php include 'includes/scripts.php' ?>
<script>
  function toggle_register() {
			<?php
			if (isset($_SESSION['success'])) {
			?>
				document.getElementById('registered_toggle').click()
			<?php
				unset($_SESSION['success']);
			}
			?>
		}
</script>
</body>

</html>