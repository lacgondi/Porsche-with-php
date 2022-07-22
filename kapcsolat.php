<?php include('inc/header.php') ?>

<<<<<<< HEAD
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

=======
>>>>>>> main
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 justify-content-center align-self-center">
      <div class="embed-responsive embed-responsive-1by1">
        <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2698.071298152101!2d19.04171131544624!3d47.449549606807345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dd9d2d56c245%3A0x1a9b56076cb2a754!2sPorsche+Centrum!5e0!3m2!1shu!2shu!4v1555334783546!5m2!1shu!2shu"></iframe>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="col-md-12 order-md-1">
<<<<<<< HEAD
        <form action="" class="needs-validation" method="POST">
=======
        <form class="needs-validation" novalidate>
>>>>>>> main
          <div class="row">

            <div class="col-md-6 mb-3">
<<<<<<< HEAD
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
=======
              <label for="firstName">Keresztnév</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Adja meg a keresztnevét.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Vezetéknév</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Adja meg a vezetéknevét.
              </div>
>>>>>>> main
            </div>
          </div>

          <div class="col--12 mb-3">
<<<<<<< HEAD
            <label for="phoneNum">Telefonszám</label>
            <span class="bfh-phone" data-format="+36 (ddd) ddd-dddd" data-number="15555555555">
              <input type="text" class="form-control" id="phoneNum" name="phoneNum" placeholder="Telefonszám">
            </span>
            <?php if (!empty($phoneNumErr)) : ?>
              <p class="text-danger"><?php echo $phoneNumErr; ?></p>
            <?php endif; ?>
=======
            <label for="username">Telefonszám</label>
            <span class="bfh-phone" data-format="+36 (ddd) ddd-dddd" data-number="15555555555"></span>
            <input type="text" class="form-control" id="bfh-phone" placeholder="Telefonszám" required>
            <div class="invalid-feedback" style="width: 100%;">
              Adja meg a telefonszámát.
            </div>

>>>>>>> main
          </div>

          <div class="col--12 mb-3">
            <label for="email">E-mail cím</label>
<<<<<<< HEAD
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
=======
            <input type="email" class="form-control" id="email" placeholder="te@pelda.com">
            <div class="invalid-feedback">
              Adja meg az e-mail címét.
            </div>
          </div>

          <div class="col--12 mb-3">
            <label for="s-product">Kiválasztott termék</label>
            <select class="form-control">
              <option>Porsche 911 Carrera S (2019)</option>
              <option>Porsche 911 Targa 4</option>
              <option>Porsche 911 Turbo Cabriolet</option>
              <option>Porsche 911 GT2 RS</option>
              <option>Porsche 718 Cayman S</option>
              <option>Porsche 718 Boxster</option>
              <option>Porsche 718 T Cayman</option>
              <option>Porsche 718 Boxster GTS</option>
              <option>Porsche Panamera 4</option>
              <option>Panamera GTS Sport Turismo</option>
              <option>Porsche Panamera Turbo Executive</option>
              <option>Porsche Panamera 4 E-Hybrid</option>
              <option>Porsche Macan (2019)</option>
              <option>Porsche Macan S (2019)</option>
              <option>Porsche Cayanne (2019)</option>
              <option>Porsche Cayanne E-Hybrid (2019)</option>
>>>>>>> main
            </select>
            <?php if (!empty($carErr)) : ?>
              <p class="text-danger"><?php echo $carErr; ?></p>
            <?php endif; ?>
          </div>
<<<<<<< HEAD
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
=======
          <hr class="mb-4">

          <h4 class="mb-3">Fizetési mód</h4>

          <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
              <label class="custom-control-label" for="credit">Bankkártya</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="keszpenz" name="paymentMethod" type="radio" class="custom-control-input" required>
              <label class="custom-control-label" for="keszpenz">Készpénz</label>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-name">Kártyán lévő név</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Teljes név a kártyán</small>
              <div class="invalid-feedback">
                Írja be a kártyán lévő nevet.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Kártyaszám</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Írja be a kártyaszámot.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-expiration">Lejárati dátum</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Írja be a lejárati dátumot.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-expiration">Biztonsági kód</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Írja be a biztonsági kódot.
>>>>>>> main
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
  window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields

  (function() {
    'use strict';

    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
<script type="text/javascript">
  function show_alert() {
    alert("Köszönjük a rendelését! Hamarosan tájékoztatjuk a termék átvételéről.")
  };
</script>


</body>

</html>