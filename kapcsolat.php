<?php include('inc/header.php') ?>

<?php
$sql = 'SELECT * FROM cars';
$result = mysqli_query($connect, $sql);
$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$firstName = $lastName = $phoneNum = $email = $car = $paymentMethod = '';
$firstNameErr = $lastNameErr = $phoneNumErr = $emailErr = $carErr = $paymentMethodErr = '';

//Validate form submit
if (isset($_POST['submit'])) {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $phoneNum = $_POST['phoneNum'];
  $email = $_POST['email'];
  $car = $_POST['car'];
  $paymentMethod = null;

  //Validate form fields being filled
  if (empty($firstName)) {
    $firstNameErr = "First name is required";
  } else {
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($lastName)) {
    $lastNameErr = "Last name is required";
  } else {
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($phoneNum)) {
    $phoneNumErr = "Phone number is required";
  } else {
    $phoneNum = filter_input(INPUT_POST, 'phoneNum', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($email)) {
    $emailErr = "Email address is required";
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  if (empty($car)) {
    $carErr = "Please choose a car";
  } else {
    $car = filter_input(INPUT_POST, 'car', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($paymentMethod)) {
    $paymentMethodErr = "Please choose a payment method";
  } else {
    $paymentMethod = filter_input(INPUT_POST, 'paymentMethod', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  //SQL send to database
  if (empty($firstName) && empty($lastName) && empty($phoneNum) && empty($email) && empty($car) && empty($paymentMethod)) {
    $sendSQL = "INSERT INTO `users`(`firstName`, `lastName`, `phoneNum`, `email`, `car`, `paymentMethod`) VALUES ('$firstName', '$lastName', '$phoneNum', '$email', '$car', '$paymentMethod')";

    if (mysqli_query($connect, $sendSQL)) {
      // echo 'New record added successfully';
    } else {
      echo 'Error' . mysqli_error($connect);
    }
    mysqli_close($connect);
  }
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 justify-content-center align-self-center">
      <div class="embed-responsive embed-responsive-1by1">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2698.071298152101!2d19.04171131544624!3d47.449549606807345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dd9d2d56c245%3A0x1a9b56076cb2a754!2sPorsche+Centrum!5e0!3m2!1shu!2shu!4v1555334783546!5m2!1shu!2shu"></iframe>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="col-md-12 order-md-1">
        <form action="" class="needs-validation" method="POST">
          <div class="row">

            <div class="col-md-6 mb-3">
              <label for="firstName" class="form-lable">Keresztnév</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="">
              <?php if (!empty($firstNameErr)) : ?>
                <p class="text-danger"><?php echo $firstNameErr; ?></p>
              <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Vezetéknév</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="">
              <?php if (!empty($lastNameErr)) : ?>
                <p class="text-danger"><?php echo $lastNameErr; ?></p>
              <?php endif; ?>
            </div>
          </div>

          <div class="col--12 mb-3">
            <label for="phoneNum">Telefonszám</label>
            <span class="bfh-phone" data-format="+36 (ddd) ddd-dddd" data-number="15555555555">
              <input type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="Telefonszám">
            </span>
            <?php if (!empty($phoneNumErr)) : ?>
              <p class="text-danger"><?php echo $phoneNumErr; ?></p>
            <?php endif; ?>
          </div>

          <div class="col--12 mb-3">
            <label for="email">E-mail cím</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="te@pelda.com">
            <?php if (!empty($emailErr)) : ?>
              <p class="text-danger"><?php echo $emailErr; ?></p>
            <?php endif; ?>
          </div>

          <div class="col--12 mb-3">
            <label for="car">Kiválasztott termék</label>
            <select class="form-control" name="car">
              <?php foreach ($output as $item) : ?>
                <option><?php echo $item['name']; ?></option>
              <?php endforeach; ?>
            </select>
            <?php if (!empty($carErr)) : ?>
              <p class="text-danger"><?php echo $carErr; ?></p>
            <?php endif; ?>
          </div>
          <hr class="mb-3">
          <div class="row">
            <div class="col-md-6 col-sm-12 mb-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="cashPayment" value="cash">
                <label class="form-check-label" for="paymentMethod">
                  Készpénz
                </label>
                <?php if (!empty($paymentMethodErr)) : ?>
                  <p class="text-danger"><?php echo $paymentMethodErr; ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 mb-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="paymentMethod" id="cardPayment" value="card">
                <label class="form-check-label" for="paymentMethod">
                  Bankkártya
                </label>
              </div>
            </div>
          </div>
          <hr class="mb-3">
          <button class="btn btn-primary btn-lg btn-block" type="submit" onclick="show_alert();">Vásárlás</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php include('inc/footer.php') ?>
</body>

</html>