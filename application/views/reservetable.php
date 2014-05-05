<h1>Reservatie voltooien</h1>
<div id="rightside">
		<div id="registratievoltooid">
			<div class="details">
				<h2>Informatie</h2>
				<p>Tafelnaam: <?php echo $query->name; ?></p>
				<p>Aantal plaatsen: <?php echo $query->amountseats; ?></p>
			</div>
	</section>
		</div>

		<div id="inloggen">
		<section id="login">
			<h2>Snel reserveren via je log in!</h2>

			<form action="login/savereserve/" method="post" autocomplete="off">
				<input type="text" name="email" placeholder="Email" value="<?php echo $post['email']; ?>" /><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
				<input type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

				<input type="submit" name="btnLogin" value="Inloggen"/>
			</form>
		</div>

	
		<div id="registreren">
		<section id="signup">
		<h2>Reserveer via een accountregistratie als je nog geen account hebt.</h2>

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
		





</div>