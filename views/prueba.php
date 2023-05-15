<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form id="myForm">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
  <br>
  <label for="email">Email:</label>
  <input type="email" name="email" id="email">
  <br>
  <button type="submit" id="submitBtn">Submit</button>
</form>




    <script src="../js/jquery-3.6.4.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>

    <script>
 $(document).ready(function() {
  $("#myForm").validate({
    rules: {
      name: "required",
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      name: "Please enter your name",
      email: {
        required: "Please enter your email",
        email: "Please enter a valid email address"
      }
    },
    submitHandler: function(form) {
      $.ajax({
        url: "submit.php",
        type: "POST",
        data: $(form).serialize(),
        success: function(response) {
          alert("Form submitted successfully!");
        },
        error: function(xhr, status, error) {
          alert("An error occurred while submitting the form: " + error);
        }
      });
    }
  });
});
    </script>
</body>
</html>