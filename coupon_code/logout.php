<?php

require("config.php");

unset($_SESSION['logged_in']);
unset($_SESSION['username']);

header("Location: index.php?status=103");

