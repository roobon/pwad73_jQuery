<?php
$db = new mysqli("localhost", "root", "", "jquery_dropdown");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="../js/jquery.min.js"></script>
</head>

<body>
  <h2>Registration Form</h2>
  <form action="">
    District <br>
    <select id="district">
      <option value="" disabled selected>Select one</option>
      <?php
      $raw = $db->query("SELECT * FROM districts");
      while ($row = $raw->fetch_assoc()) {
      ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['district'] ?></option>
      <?php  } ?>
    </select><br>
    Upazilla <br>
    <select name="" id="upazila">
      <option value="" selected disabled>Select one</option>
    </select><br>
    <input type="submit" value="SUBMIT" />
  </form>
  <script>
    $(document).ready(function() {
      $("#district").on('change', function() {
        //alert($(this).val());
        $.get("upazilla.php", {
          distid: $(this).val()
        }, function(data, status) {
          //alert(data);
          $("#upazila").html(data);
        })
      })
    });
  </script>
</body>

</html>