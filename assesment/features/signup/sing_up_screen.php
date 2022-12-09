<!DOCTYPE html>
<!--
  - ui which contains the form for signup
-->
<html>
    <head>
        <title>Welcome to the book system</title>
        <link rel="stylesheet" href="../../css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <script>
          function onlyNumberKey(evt) {
            // fucnction for validate phone: contains only numbers
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)){
              return false;
            }
            return true;
          }
          // fucnction for password confirmation
          function validate_password() {
              var pass = document.getElementById('Password').value;
              var confirm_pass = document.getElementById('confirm_pass').value;
              if (pass != confirm_pass) {
                  document.getElementById('wrong_pass_alert').style.color = 'red';
                  document.getElementById('wrong_pass_alert').innerHTML
                    = 'Use same password';
                  document.getElementById('create').disabled = true;
                  document.getElementById('create').style.opacity = (0.4);
              } else {
                  document.getElementById('wrong_pass_alert').style.color = 'green';
                  document.getElementById('wrong_pass_alert').innerHTML =
                      'Password Matched';
                  document.getElementById('create').disabled = false;
                  document.getElementById('create').style.opacity = (1);
              }
          }
          // function for display that password and confirm password are differernt
          function wrong_pass_alert() {
              if (document.getElementById('pass').value != "" &&
                  document.getElementById('confirm_pass').value != "") {
                  alert("Your response is submitted");
              } else {
                  alert("Please fill all the fields");
              }
          }
        </script>
    </head>
    <body>
      <div class="parent clearfix">
        <div class="bg-illustration">
        
              <div class="burger-btn">
                <span></span>
                <span></span>
                <span></span>
              </div>
        
            </div class="bg-illustration">
            
            <div class="login">
              <div class="container">
                <h1>Sign up to create<br />your account</h1>
            
                <div class="login-form">
                    <div class="extra-action">
                      <a href="../login/login_screen.php">Already have an account? Log in</a>
                    </div>  
                    <form method="POST" action="signup_form.php">
                      <div class="about">
                        <input type="text" name="Username" placeholder="User name" required>
                        <input type="text" name="Firstname" placeholder="First name" required>
                        <input type="text" name="Surname" placeholder="Surname" required>
                      </div>
                      <div class="location">
                        <input type="text" name="Address" placeholder="Address" required>
                        <input type="text" name="Area" placeholder="Area" required>
                        <input type="text" name="City" placeholder="City" required>
                      </div>
                      <div class="tel">
                        <input name="Telephone" placeholder="Telephone (only numbers)" minlength="10" maxlength="10" required onkeypress="return onlyNumberKey(event)">
                        <input name="Mobile" placeholder="Mobile (only numbers)" minlength="10" maxlength="10" required onkeypress="return onlyNumberKey(event)"> 
                      </div>
                      <div class="pass">
                          <input id="Password" type="password" name="Password" minlength="6" maxlength="6" placeholder="Enter Password" required>
                          <input id="confirm_pass" type="password" minlength="6" maxlength="6" name="confirm_pass" placeholder="Confirm Password" required  onkeyup="validate_password()">
                      </div>
                      <span id="wrong_pass_alert"></span>
                      <button type="submit">SIGN UP</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
    </body>
</html>