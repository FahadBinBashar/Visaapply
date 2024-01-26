<?php
include 'connection.php';

// Check if category_id is set and not empty
if (isset($_POST['category_id']) && !empty($_POST['category_id'])) {
    // Get category_id from POST data
    $CategoryID = $_POST['category_id'];

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM support WHERE sid = $CategoryID";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameter to the prepared statement
        $stmt->bind_param("s", $CategoryID);

        // Execute the statement
        $result = $stmt->execute();

        if ($result) {
            // Redirect to the specified page after successful deletion
            header("Location: ../edsubmitted.php");
            exit();
        } else {
            // Display an error message in case of execution failure
            die("Error executing query: " . $stmt->error);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Display an error message if the prepared statement creation fails
        die("Error in statement: " . $conn->error);
    }
} else {
    // Display an error message if category_id is not set or empty
    die("Invalid category ID");
}

// Close the database connection
$conn->close();
?>
