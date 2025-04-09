<?php
// Define the connection string for PostgreSQL
$conString = "host=82.165.6.246 port=5432 dbname=pg24_225321 user=pg24tylerevetts password=pgte782454";

// Attempt to establish a connection to the PostgreSQL database
$pgCon = pg_connect($conString);

// Check if the connection was successful
if (!$pgCon) {
    // Connection failed, print an error message
    echo "Error: Unable to connect to the database.";
    exit();
}

// Connection successful, proceed with database queries
echo "Successfully connected to the database.";

// Don't forget to close the connection when you're done
// pg_close($pgCon); // Uncomment this when you're done with the connection
?>
