<?php include('inc/header.php') ?>

<?php
$firstName = $lastName = $phoneNum = $email = $car = $cardName = $cardNum = $cardExpire = $cardCCV = '';
$firstNameErr = $lastNameErr = $phoneNumErr = $emailErr = $carErr = $cardNameErr = $cardNumErr = $cardExpireErr = $cardCCVErr = '';


if (isset($_POST['submit'])) {
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
    $phoneNumErr = "Cell number is required";
  } else {
    $phoneNum = filter_input(INPUT_POST, 'phoneNum', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($email)) {
    $emailErr = "Email is required";
  } else {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  if (empty($car)) {
    $carErr = "Please choose a car";
  } else {
    $car = filter_input(INPUT_POST, 'car', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($cardName)) {
    $cardNameErr = "Name on card is required";
  } else {
    $cardName = filter_input(INPUT_POST, 'cardName', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($cardNum)) {
    $cardNumErr = "Card number is required";
  } else {
    $cardNum = filter_input(INPUT_POST, 'cardNum', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($cardExpire)) {
    $cardExpireErr = "cardExpire date is required";
  } else {
    $cardExpire = filter_input(INPUT_POST, 'cardExpire', FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($cardCCV)) {
    $cardCCVErr = "cardCCV is required";
  } else {
    $cardCCV = filter_input(INPUT_POST, 'cardCCV', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($firstName) && empty($lastName) && empty($phoneNum) && empty($email) && empty($car) && empty($cardName) && empty($cardNum) && empty($cardExpire) && empty($cardCCV)) {
    $sql = "INSERT INTO users (firstName, lastName, phoneNum, email, car, cardName, cardNum, cardExpire, cardCCV) VALUES ('$firstName', '$lastName', '$phoneNum', '$email', '$car', '$cardName', '$cardNum', '$cardExpire', '$cardCCV');";

    if (mysqli_query($connect, $sql)) {
      header('Location: index.php');
    } else {
      echo 'Error: ' . mysqli_error($connect);
    }
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName" class="form-lable">Keresztnév</label>
              <input type="text" class="form-control <?php echo $firstNameErr ? 'is-invalid' : null; ?>" id="firstName" name="firstName" placeholder="">
              <div class="invalid-feedback"><?php echo $firstNameErr; ?> </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Vezetéknév</label>
              <input type="text" class="form-control <?php echo $lastNameErr ? 'is-invalid' : null; ?>" id="lastName" name="lastName" placeholder="">
              <div class="invalid-feedback"><?php echo $lastNameErr; ?></div>
            </div>
          </div>

          <div class="col--12 mb-3">
            <label for="phoneNum">Telefonszám</label>
            <span class="bfh-phone" data-format="+36 (ddd) ddd-dddd" data-number="15555555555">
              <input type="text" class="form-control <?php echo $phoneNumErr ? 'is-invalid' : null; ?>" id="phoneNum" placeholder="Telefonszám" name="phoneNum">
            </span>
            <div class="invalid-feedback" style="width: 100%;"><?php echo $phoneNumErr; ?></div>
          </div>

          <div class="col--12 mb-3">
            <label for="email">E-mail cím</label>
            <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid' : null; ?>" id="email" name="email" placeholder="te@pelda.com">
            <div class="invalid-feedback"><?php echo $emailErr; ?></div>
          </div>

          <div class="col--12 mb-3">
            <label for="car">Kiválasztott termék</label>
            <select class="form-control" name="car">
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
            </select>
          </div>
          <hr class="mb-4">

          <h4 class="mb-3">Fizetés</h4>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cardName">Kártyán lévő név</label>
              <input type="text" class="form-control <?php echo $cardNameErr ? 'is-invalid' : null; ?>" id="cardName" placeholder="" name="cardName">
              <small class="text-muted">Teljes név a kártyán</small>
              <div class="invalid-feedback">Írja be a kártyán lévő nevet.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cardNum">Kártyaszám</label>
              <input type="text" class="form-control <?php echo $cardNumErr ? 'is-invalid' : null; ?>" id="cardNum" placeholder="" name="cardNum">
              <div class="invalid-feedback"><?php echo $cardNumErr; ?></div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cardExpire">Lejárati dátum</label>
              <input type="text" class="form-control <?php echo $cardExpireErr ? 'is-invalid' : null; ?>" id="cardExpire" placeholder="" name="cardExpire">
              <div class="invalid-feedback"><?php echo $cardExpireErr; ?></div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cardCCV">Biztonsági kód</label>
              <input type="text" class="form-control <?php echo $cardCCVErr ? 'is-invalid' : null; ?>" name="cardCCV" id="cvv" placeholder="">
              <div class="invalid-feedback"><?php echo $cardCCVErr; ?></div>
            </div>
          </div>
          <hr class="mb-3">
          <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" name="submit">Vásárlás</button>
        </form>
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