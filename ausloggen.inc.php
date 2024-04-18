<?php
if (isset($_SESSION['einloggen']))
{
   unset($_SESSION['einloggen']);
}
header("Location: index.php");
?>