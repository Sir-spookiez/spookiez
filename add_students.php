<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'] ?? '';
    $trip_id = $_POST['trip_id'] ?? '';
    $payment_status = $_POST['payment_status'] ?? '';
    $consent_form = $_POST['consent_form'] ?? '';

    $student_data = [
        'student_name' => $student_name,
        'trip_id' => $trip_id,
        'payment_status' => $payment_status,
        'consent_form' => $consent_form
    ];

    $file = 'students.txt';
    $handle = fopen($file, 'a');
    fwrite($handle, json_encode($student_data) . "\n");
    fclose($handle);

    header('Location: index.php');
    exit;
}
?>
