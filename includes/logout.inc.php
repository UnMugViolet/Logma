<?php

session_start();
session_unset();
session_destroy();


// Going back to root
header("location: ../index.php?loggedout=true");

