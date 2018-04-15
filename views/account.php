<?php
  $customer_id = $_SESSION['id'];
  if($customer_id){
  $query = "SELECT * FROM customers WHERE customer_id=".$customer_id;
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);
  $email = $row['customer_email'];
  $name = $row['customer_name'];
  $kind = $row['customer_kind'];

  }
?>
<div class="container mainContainer">
  <div class="col-md-8 order-md-2">
<h4 class="mb-3">Customer Info</h4>
<form class="needs-validation" autocomplete="on" method=POST action="?page=updateAccount" >
<div class="form-group row">
  <label for="example-email-input" class="col-2 col-form-label">Email</label>
  <div class="col-10">
    <input class="form-control" type="text" value="<?php echo $email;?>"  name="email" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Name</label>
  <div class="col-10">
    <input class="form-control" type="search" value="<?php echo $name;?>" name="name" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-password-input" class="col-2 col-form-label">Password</label>
  <div class="col-10">
    <input class="form-control"  placeholder="Enter New Password" value="" name="password" >
  </div>
</div>
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Kind</label>
  <div class="col-10">
    <select class="custom-select d-block w-100" name="kind" required>
      <option value="1"<?php if($kind=="1") echo "selected";?>>Home</option>
      <option value="2"<?php if($kind=="2") echo "selected";?>>Business</option>
    </select>
  </div>
</div>
<?php
  if($kind=="1"){
    $query = "SELECT * FROM customer_home WHERE home_id=".$customer_id;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    if($row['marriage_status'] == '1'){
      $single = "selected";
    } else if($row['marriage_status'] == '2')
      $married = "selected";
    else
      $unknown = "selected";
    echo "<div class=\"form-group row\">
  <label for=\"example-search-input\" class=\"col-2 col-form-label\">Marriage_status</label>
  <div class=\"col-10\">
    <select class=\"custom-select d-block w-100\" name=\"marriage\" required>
      <option value=\"1\"".$single.">Single</option>
      <option value=\"2\"".$married.">Married</option>
      <option value=\"3\"".$unknown.">Unknown</option>
    </select>
  </div>
</div>";
    if($row['gender'] == '1'){
      $male = "selected";
    } else if($row['gender'] == '2')
      $female = "selected";
    else
      $unknowngender = "selected";
    echo "<div class=\"form-group row\">
  <label for=\"example-search-input\" class=\"col-2 col-form-label\">Gender</label>
  <div class=\"col-10\">
    <select class=\"custom-select d-block w-100\" name=\"gender\" required>
      <option value=\"1\"".$male.">Male</option>
      <option value=\"2\"".$female.">Female</option>
      <option value=\"3\"".$unknowngender.">Other</option>
    </select>
  </div>
  </div>";
  echo "<div class=\"form-group row\">
  <label for=\"example-search-input\" class=\"col-2 col-form-label\">Age</label>
  <div class=\"col-10\">
    <input class=\"form-control\" type=\"number\" value=\"".$row['age']."\" name=\"age\" required>
  </div>
</div>";
echo "<div class=\"form-group row\">
  <label for=\"example-search-input\" class=\"col-2 col-form-label\">Income</label>
  <div class=\"col-10\">
  <input class=\"form-control\" type=\"number\" value=\"".$row['income']."\" name=\"income\" required>
  </div></div>";
  } else if($kind=="2"){
    $query = "SELECT * FROM customer_business WHERE business_id=".$customer_id;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    echo "<div class=\"form-group row\">
    <label for=\"example-search-input\" class=\"col-2 col-form-label\">Category</label>
    <div class=\"col-10\">
    <input class=\"form-control\" type=\"text\" value=\"".$row['business_category']."\" name=\"category\" required>
    </div></div>";
    echo "<div class=\"form-group row\">
    <label for=\"example-search-input\" class=\"col-2 col-form-label\">Annual Income</label>
    <div class=\"col-10\">
    <input class=\"form-control\" type=\"number\" value=\"".$row['gross_annual_income']."\" name=\"annualIncome\" required>
    </div></div>";
  }
?>
<button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
</form>
</div>
</div>
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