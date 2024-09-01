<?php
session_start(); // Start the session

// Clear the session data
$_SESSION = array();

// Destroy the session
session_destroy();
