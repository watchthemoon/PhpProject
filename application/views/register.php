<section class="contain">

	<h2>Registreer als gebruiker of restauranthouder</h2>

		<form action="/register/save/" method="post" autocomplete="off">

			<input required type="text" name="firstname" placeholder="Voornaam" value="<?php echo $post['firstname']; ?>" /><?php if ($errors['firstname'] != ''){ echo $errors['firstname']; } ?>
			<input required type="text" name="name" placeholder="Achternaam" value="<?php echo $post['name']; ?>" /><?php if ($errors['name'] != ''){ echo $errors['name']; } ?>
			<input required type="email" name="email" placeholder="Email"/ value="<?php echo $post['email']; ?>" ><?php if ($errors['email'] != ''){ echo $errors['email']; } ?>
			<input required type="text" name="phonenumber" placeholder="Telefoonnummer" value="<?php echo $post['phonenumber']; ?>" /><?php if ($errors['phonenumber'] != ''){ echo $errors['phonenumber']; } ?>

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

			<input required type="password" name="password" placeholder="Paswoord"/><?php if ($errors['password'] != ''){ echo $errors['password']; } ?>

			<input type="checkbox" name="isAdmin" value="yes" id="isAdmin">
			<label for="isAdmin">Ik ben een restauranthouder</label>

			<input type="submit" value="Registreren"/>

		</form>

	</section>