<?php
  $arr = unserialize($_COOKIE["cart"]);
  $customer_id = $_SESSION['id'];
  if($customer_id){
  $query = "SELECT customer_address FROM customers WHERE customer_id=".$customer_id;
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);
  $address = $row['customer_address'];
  if($address){
    $query = "SELECT * FROM address_payment WHERE address_id=".$address;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $email = $row['email'];
    $address = $row['address'];
    $country = $row['country'];
    $state = $row['state'];
    $zip = $row['zip'];
    $card_type = $row['card_type'];
    $cc_name = $row['name_on_card'];
    $cc_number = $row['card_number'];
    $cc_expiration = $row['expiration'];
    $cc_cvv = $row['cvv'];
  }
  }
?>

<body class="bg-light">

    <div class="container">


      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">
              <?php if(!empty($arr[0]))
                    echo count($arr);
                    else echo 0;
              ?></span>
          </h4>
          <ul class="list-group mb-3">
            <?php
              $sum = 0.0;
              if(!empty($arr[0])){
              foreach ($arr as $value) {
                $query = "SELECT book_name,book_price FROM books WHERE book_id='$value[0]'";
                $result = mysqli_query($link, $query);
                $book_id = $value[0];
                $type = $value[1];
                $quantity = $value[2];
                $book_name;
                $book_price;
                $row = $result->fetch_assoc();
                foreach($row as $key=>$value){
                    switch ($key){
                    case "book_name":
                    $book_name = $value;
                    break;
                    case "book_price":
                    $book_price = $value;
                    break;
                    default:
                    break;
                    }
                  }

                $total = (double)$quantity*(double)$book_price;
                $sum += $total;
                echo "<li id=\"".$book_id."\"class=\"list-group-item d-flex justify-content-between lh-condensed\">
              <div>
                <h6 class=\"my-0\">".$book_name."</h6>
                <class=\"text-muted\">".$type."   $".$book_price."   x ".$quantity."</small>
              </div>
              <span>
              <form action=\"?page=deleteCart\" method=POST><input type=\"hidden\" name=\"id\" value=\"".$book_id."\"><button type=\"submit\" class=\"btn btn-outline-danger\">Delete</button></form></span></li>";
              }
            }
            ?>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$<?php
              echo $sum;
              ?></strong>
            </li>
          </ul>

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Delivery Address</h4>
          <form class="needs-validation" autocomplete="on" method=POST action="?page=checkout" >
            <input type="hidden" name="totalPrice" <?php echo "value=\"".$sum."\""?>>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName" >First name</label>
                <input type="text" class="form-control" name="firstName" <?php echo "value=\"".$firstname."\""?> required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" <?php echo "value=\"".$lastname."\""?> required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" <?php echo "value=\"".$email."\""?>>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required <?php echo "value=\"".$address."\""?>>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="country" required>
                  <option value="">Choose...</option>
                  <option selected="selected">United States</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="state" required>
                  <option <?php
                    echo "value=\"".$state."\">";
                    if($state)
                      echo $states[$state];
                    else
                      echo "Choose...";?>
                    </option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" name="zip" <?php echo "value=\"".$zip."\""?> required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>


            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" value="credit" type="radio" class="custom-control-input" <?php if($card_type=="credit")echo "checked"?> required>
                <label class="custom-control-label" for="credit">Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" value="debit" type="radio" class="custom-control-input" <?php if($card_type=="debit")echo "checked"?> required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Name on card</label>
                <input type="text" class="form-control" name="cc-name" <?php echo "value=\"".$cc_name."\""?> required>
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                  Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Card number</label>
                <input type="text" class="form-control" name="cc-number" <?php echo "value=\"".$cc_number."\""?> required>
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expiration</label>
                <input type="text" class="form-control" name="cc-expiration" <?php echo "value=\"".$cc_expiration."\""?> required>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" name="cc-cvv" <?php echo "value=\"".$cc_cvv."\""?> required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block"  type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">

      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
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
  </body>