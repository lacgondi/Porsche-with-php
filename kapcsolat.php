<?php include('inc/header.php') ?>

<?php
$first_name = $last_name = $cell_number = $email = $car = $name_on_card = $card_number = $ccv = '';
$first_name_err = $last_name_err = $cell_number_err = $email_err = $car_err = $name_on_card_err = $card_number_err = $ccv_err = '';


if (isset($_POST['submit'])) {
  if (empty($first_name)) {
    $first_name_err = "First name is required";
  } else {
    $first_name = filter_input(INPUT_POST, $_POST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($last_name)) {
    $last_name_err = "Last name is required";
  } else {
    $last_name = filter_input(INPUT_POST, $_POST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($cell_number)) {
    $cell_number_err = "Cell number is required";
  } else {
    $cell_number = filter_input(INPUT_POST, $_POST['cell_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (empty($email)) {
    $email_err = "Email is required";
  } else {
    $email = filter_input(INPUT_POST, $_POST['email'], FILTER_SANITIZE_EMAIL);
  }
  if (empty($car)) {
    $car_err = "Please choose a car";
  } else {
    $car = filter_input(INPUT_POST, $car, FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($name_on_card)) {
    $name_on_card_err = "Name on card is required";
  } else {
    $name_on_card = filter_input(INPUT_POST, $_POST['name_on_card'], FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($card_number)) {
    $card_number_err = "Card number is required";
  } else {
    $card_number = filter_input(INPUT_POST, $_POST['card_number'], FILTER_SANITIZE_SPECIAL_CHARS);
  }
  if (empty($ccv)) {
    $ccv_err = "CCV is required";
  } else {
    $ccv = filter_input(INPUT_POST, $_POST['ccv'], FILTER_SANITIZE_SPECIAL_CHARS);
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
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate method="POST">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Keresztnév</label>
              <input type="text" class="form-control" id="firstName" name="first_name" placeholder="" required>
              <div class="invalid-feedback">Adja meg a keresztnevét.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Vezetéknév</label>
              <input type="text" class="form-control" id="lastName" name="last_name" placeholder="" required>
              <div class="invalid-feedback">Adja meg a vezetéknevét.</div>
            </div>
          </div>

          <div class="col--12 mb-3">
            <label for="username">Telefonszám</label>
            <span class="bfh-phone" data-format="+36 (ddd) ddd-dddd" data-number="15555555555"></span>
            <input type="text" class="form-control" id="bfh-phone" placeholder="Telefonszám" name="cell_number" required>
            <div class="invalid-feedback" style="width: 100%;">Adja meg a telefonszámát.</div>

          </div>

          <div class="col--12 mb-3">
            <label for="email">E-mail cím</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="te@pelda.com">
            <div class="invalid-feedback">Adja meg az e-mail címét.</div>
          </div>

          <div class="col--12 mb-3">
            <label for="s-product">Kiválasztott termék</label>
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
              <div class="invalid-feedback">Írja be a kártyán lévő nevet.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-number">Kártyaszám</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">Írja be a kártyaszámot.</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="cc-expiration">Lejárati dátum</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">Írja be a lejárati dátumot.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="cc-expiration">Biztonsági kód</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">Írja be a biztonsági kódot.</div>
            </div>
          </div>
          <hr class="mb-3">
          <button class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" name="submit" onclick="show_alert();">Vásárlás</button>
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