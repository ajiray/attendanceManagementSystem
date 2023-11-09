<style>
	.form__group {
  position: relative;
  padding: 20px 0 0;
  margin-top: 10px;
  width: 100%;
  max-width: 300px;
  margin-left: 32%;
}

.form__field {
  font-family: inherit;
  width: 100%;
  border: none;
  border-bottom: 2px solid #9b9b9b;
  outline: 0;
  font-size: 17px;
  color: #F1F6F9;
  padding: 7px 0;
  background: transparent;
  transition: border-color 0.2s;
}

.form__field::placeholder {
  color: transparent;
}

.form__field:placeholder-shown ~ .form__label {
  font-size: 17px;
  cursor: text;
  top: 20px;
}

.form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 17px;
  color: #F1F6F9;
  pointer-events: none;
}

.form__field:focus {
  padding-bottom: 6px;
  font-weight: 700;
  border-width: 3px;
  border-image: linear-gradient(to right, #116399, #38caef);
  border-image-slice: 1;
}

.form__field:focus ~ .form__label {
  position: absolute;
  top: 0;
  display: block;
  transition: 0.2s;
  font-size: 17px;
  color: #F1F6F9;
  font-weight: 700;
}

/* reset input */
.form__field:required, .form__field:invalid {
  box-shadow: none;
}
select {
	margin-top: 20px;
	font-size: 20px;
	width: 300px;
}
button {
    --button_radius: 0.75em;
 --button_color: #e8e8e8;
 --button_outline_color: #000000;
 font-size: 17px;
 font-weight: bold;
 border: none;
 border-radius: var(--button_radius);
 background: var(--button_outline_color);
 margin-top: 20px;
 margin-left: 10px;
 cursor: pointer;
}

.button_top {
 display: block;
 box-sizing: border-box;
 border: 2px solid var(--button_outline_color);
 border-radius: var(--button_radius);
 padding: 0.75em 1.5em;
 background: var(--button_color);
 color: var(--button_outline_color);
 transform: translateY(-0.2em);
 transition: transform 0.1s ease;
}

button:hover .button_top {
  /* Pull the button upwards when hovered */
 transform: translateY(-0.33em);
}

button:active .button_top {
  /* Push the button downwards when pressed */
 transform: translateY(0);
}
.box {
	background-color: #14274E;
	width: 50%;
	text-align: center;
	border-radius: 10px;
	margin-left: 25%;
	margin-top: 6%;
  height: 550px;
}
h2 {
	color: whitesmoke;
	font-size: 50px;
	margin-top: 30px;
}
.error {
	background: #F2DEDE;
	color: #A94442;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 49%;
	border-radius: 5px;
	margin-top: -155px;
	position: absolute;
 }
 .success {
	background: #b6fab6;
	color: green;
	padding: 5px;
	text-align: center;
  font-size: 25px;
	width: 49%;
	border-radius: 5px;
	margin-top: -155px;
	position: absolute;
 }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
	<style>
	@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
    body {
        background-color: white;
    }
    </style>
	<div class="box">
		<form action="./processsignup.php" method="post" autocomplete="off">
			<h2>New Account</h2>
			<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     		<?php } ?>

      <?php if (isset($_GET['success'])) {  ?>
        <em><p class="success"><?php echo $_GET['success']; ?></p></em>
 <?php } ?>
			<div class="form__group field">
    		<input required="" placeholder="Name" class="form__field" name="name" type="input">
    		<label class="form__label" for="name">Name</label>
			</div>

			<div class="form__group field">
    		<input required="" placeholder="Username" class="form__field" name="username" type="input">
    		<label class="form__label" for="name">Username</label>
			</div>

			<div class="form__group field">
    		<input required="" placeholder="Password" class="form__field" name="password" type="password">
    		<label class="form__label" for="name">Password</label>
			</div>
			
			<div class="form__group field">
    		<input required="" placeholder="Confirm Password" class="form__field" name="password_confirmation" id="password_confirmation" type="password">
    		<label class="form__label" for="name">Confirm Password</label>
			</div>
			
            <div class="inputBox">
            <select name="usertype">
			<option value= disabled selected hidden>Type of User</option>
			<option value="admin">Admin</option>
			<option value="Professor">Faculty</option>
            <option value="dean">Dean</option>
		    </select>
			</div>
			<button onclick="clicked(event)">
        	<span class="button_top"> 
             Submit
        	</span>
        	</button>
		</form>

    <script>
function clicked(e)
{
    if(!confirm('Are you sure you want to Sign up this user?')) {
        e.preventDefault();
    }
}
</script>
	</div>
</body>
</html>