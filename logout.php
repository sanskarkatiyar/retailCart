<?php
<<<<<<< HEAD
session_start();
if(session_destroy())
{
	header("Location: index.php");
}
=======
   session_start();
   
   if(session_destroy()) {
      header("Location: index.php");
   }
>>>>>>> origin/master
?>