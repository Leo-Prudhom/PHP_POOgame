<?php
  include'header.php';

?>

<h1>Set yout fighter</h1>
  <p>Default value for health is 100</p>

  <form action="createContact.php" method="POST" accept-charset="utf-8">

    <label for="name"> Name:
      <input type="text" name="name" id="name">
    </label>

    <label for="strength"> Strength:
      <input type="text" name="strength" id="strength">
    </label>

    <input type="submit" name="submit" value="Set your attributes">

  </form>

<?php
    include'footer.php';
?>
