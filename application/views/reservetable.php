<h1>Reservatie voltooien</h1>
<div id="rightside">

	<?php if($registrerendiv==1){?>
		<div>
			<p></p>	
		</div>
		
	<?php } else{ ?>
		<div id="inloggen">
		<section id="login">
			<h2>Snel reserveren via je log in!</h2>

			<form action="login/savereserve/" method="post" autocomplete="off">
				<input type="text" name="email" placeholder="Email" value="<?php echo $post['email']; ?>" /><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
				<input type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

				<input type="submit" name="btnLogin" value="Inloggen"/>
			</form>

			<form action="login/showregister/" method="post">
			<input type="submit" id="btnnoggeenacc" name="btnnoggeenacc" value="Ik heb nog geen account"/>
			</form>
		</div>
	<?php }; ?>

	<?php if($registrerendiv==1){?>
		<div id="registreren">
		<section id="signup">
		<h2>Reserveer via een accountregistratie.</h2>

		<form action="/register/savereserve/" method="post" autocomplete="off">

			<input type="text" name="firstname" placeholder="Voornaam" value="<?php echo $post['firstname']; ?>" /><?php if ($errors['firstname'] != ''){ echo $errors['firstname']; } ?>
			<input type="text" name="name" placeholder="Achternaam" value="<?php echo $post['name']; ?>" /><?php if ($errors['name'] != ''){ echo $errors['name']; } ?>
			<input type="email" name="email" placeholder="Email"/ value="<?php echo $post['email']; ?>" ><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
			<input type="text" name="phonenumber" placeholder="Telefoonnummer" value="<?php echo $post['phonenumber']; ?>" /><?php if ($errors['phonenumber'] != ''){ echo $errors['phonenumber']; } ?>

			<label>Geboortedatum</label><br/>
			<select name="day">
				<?php for($d = 1; $d <= 31; $d++){ ?>
					<option value="<?php echo $d ?>" <?php if ($d == $post['day']){ ?>selected="selected"<?php } ?>><?php echo $d ?></option>
				<?php } ?>
			</select>
			<select name="month">
				<?php for($m = 1; $m <= 12; $m++){ ?>
					<option value="<?php echo $m ?>" <?php if ($m == $post['month']){ ?>selected="selected"<?php } ?>><?php echo $m ?></option>
				<?php } ?>
			</select>
			<select name="year">
				<?php for($y = date("Y"); $y > 1914; $y--){ ?>
					<option value="<?php echo $y ?>" <?php if ($y == $post['year']){ ?>selected="selected"<?php } ?>><?php echo $y ?></option>
				<?php } ?>
			</select>
			<?php if ($errors['day'] != ''){ echo $errors['day']; } ?>

			<input type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

			<input type="submit" value="Registreren"/>

		</form>
	</div>
		
	<?php }else{ ?>
		<div>
				<p></p>	
		</div>
		
	<?php }; ?>

	<?php if($registratievoltooiddiv==1){ ?>

	<div id="registratievoltooid">
		<p>tonen wanneer de registratie voltooid is met een link terug naar het restaurant of de homepage. </p>
		<p>Invullen welk uur de tafel bezet moet zijn, welke reservatie, adres informatie, ... </p>
	</div>
	<?php }else{ ?>
		<div>
			<p></p>	
		</div>
	<?php }; ?>

</div>