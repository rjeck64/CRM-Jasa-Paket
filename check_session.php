<?php
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>
