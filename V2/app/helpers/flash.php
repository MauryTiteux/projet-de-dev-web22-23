<?php
// Initialize Sessions
session_start();

// Destroy all alerts
function flashDestroy()
{
  $_SESSION['alert'] = [];
}

// Add an alert
function flashAdd($type, $message)
{
  array_push($_SESSION['alert'], ['type' => $type, 'message' => $message]);
}
