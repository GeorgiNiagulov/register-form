<h1>REGISTER NEW USER</h1>

<form method="post" name="form" onsubmit="return(validate());">
    <label>
        Name: <input type="text" name="first_name"/> <br />
    </label>
    <label>
        Middle Name: <input type="text" name="middle_name"/><br />
    </label>
    <label>
        Last Name: <input type="text" name="last_name"/><br />
    </label>
    <label>
        PIN: <input type="text" name="pin"/><br />
    </label>
    <label>
        Username: <input type="text" name="username"/><br />
    </label>
    <label>
        Password: <input type="text" name="user_password"/> <br />
    </label>
    <label>
        Confirm Password: <input type="text" name="confirm_password"/> <br />
    </label>

    <input type="submit" name="register" value="Register"/> <br />

</form>

<a href="index.php">back</a>
 <script type="text/javascript">
  function validate(){
    if( document.form.first_name.value.length < 2) {
            alert( "First Name must be two or more symbols!" );
            document.form.first_name.focus() ;
            return false;
         }

    if( document.form.middle_name.value.length < 2) {
            alert( "Middle Name must be two or more symbols!" );
            document.form.middle_name.focus() ;
            return false;
        }
    if( document.form.last_name.value.length < 2) {
            alert( "Last Name must be two or more symbols!" );
            document.form.last_name.focus() ;
            return false;
        }
    if( document.form.username.value.length < 3) {
            alert( "Username must be tree or more symbols!" );
            document.form.username.focus() ;
            return false;
        }
    if( document.form.user_password.value.length < 6) {
            alert( "Password must be 6 or more symbols!" );
            document.form.user_password.focus() ;
            return false;
        }

    if (document.form.user_password.value != document.form.confirm_password.value) {
            alert("Passwords do not match!");
            return false;
            }
    if (document.form.pin.value.length != 10) {
            alert("PIN must be 10 digits!");
            return false;
            }

    return( true );
  }

 </script>
