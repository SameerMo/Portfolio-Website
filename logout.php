<<<<<<< HEAD
<?php
session_start();
session_unset();
session_destroy();
header("Location: index.php?status=loggedout");
=======
<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php?status=loggedout");
>>>>>>> 9a0219555f9c3ea5758e4ab3d627cd0c72cf33de
exit();