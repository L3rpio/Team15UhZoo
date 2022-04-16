<?php
ob_start();
session_start();
session_unset();
session_destroy();

header("location:../index.php?msg=loggingOut");
session_regenerate_id(true);
session_write_close();
ob_end_clean();
die();
exit();
// ob_end_clean();