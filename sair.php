<?php
session_start();

unlink($_SESSION['usuario']);

$_SESSION['usuario'] = null;
session_start();

unlink($_SESSION['vereditar']);

$_SESSION['vereditar'] = null;

unlink($_SESSION['add']);

$_SESSION['add'] = null;

unlink($_SESSION['adm']);

$_SESSION['adm'] = null;

unlink($_SESSION);

$_SESSION = null;

session_destroy();

header("Location: login.php");