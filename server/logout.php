<?php

ini_set('session.gc_maxlifetime', 86400);
session_start();
((!isset($_SESSION['user'])) ? header("location: ./") : null);
session_destroy();

header("location: ../index.php");
