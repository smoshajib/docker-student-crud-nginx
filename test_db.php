<?php
include 'db.php';

if ($pdo) {
    echo "Database connection successful!\n";
} else {
    echo "Database connection failed!\n";
}
