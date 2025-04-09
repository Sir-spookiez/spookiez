<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trip_name = $_POST['trip_name'] ?? '';
    $venue = $_POST['venue'] ?? '';
    $cost = $_POST['cost'] ?? '';
    $transport = $_POST['transport'] ?? '';
    $lead_staff = $_POST['lead_staff'] ?? '';

    $trip_data = [
        'trip_name' => $trip_name,
        'venue' => $venue,
        'cost' => $cost,
        'transport' => $transport,
        'lead_staff' => $lead_staff
    ];

    $file = 'trips.txt';
    $handle = fopen($file, 'a');
    fwrite($handle, json_encode($trip_data) . "\n");
    fclose($handle);

    header('Location: index.php');
    exit;
}
?>
