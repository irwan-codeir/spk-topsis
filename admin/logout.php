<?php 
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman ke login
header("Location: login.php");
