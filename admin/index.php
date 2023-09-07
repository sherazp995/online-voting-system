<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<style>
    * {
      margin: 0px;
      padding: 0px;
    }

    html {
      height: 100%;
    }

    body {
      background-image: url("../includes/voting.jpg") !important;
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
	#login{
		width: 100%;
		margin-top: 16px;
		
	}
  </style>

<body >
<div >
<main class="main">
    <div>
      <h3>
        Web Based Online Voting System
      </h3>
      <hr>

      <div>
        <h2 class="text-center">Login</h2>
        <form action="login.php" method="POST" class="d-flex justify-content-center flex-column">
          <div>
            <label for="username" class="form-label h5">User Name</label>
            <input type="text" class="form-control" name="username" placeholder="Voter's ID" required>
          </div>
          <div>
            <label for="password" class="form-label h5">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
          </div>
          <button id="login" class="btn btn-primary mt-2" type="submit" name="login">Login</button><br />
                
        </form>
      </div>
    </div>
  </main>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
<!-- </div> -->
	
<?php include 'includes/scripts.php' ?>
</body>
</html>