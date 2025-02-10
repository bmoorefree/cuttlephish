<?php
// Message to provide user feedback
$message = '';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if domain is provided and trim whitespace
    if (isset($_POST['domain']) && trim($_POST['domain']) !== '') {
        $domain = trim($_POST['domain']);

        // Validate the domain using FILTER_VALIDATE_DOMAIN with FILTER_FLAG_HOSTNAME
        if (filter_var($domain, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME)) {
            // Specify the file to update (adjust the path as needed)
            $filename = 'blocked domains.acl';

            // Open the file in append mode
            if ($fp = fopen($filename, 'a')) {
                // Lock the file to prevent simultaneous writes
                if (flock($fp, LOCK_EX)) {
                    // Write the domain with a newline at the end
                    if (fwrite($fp, $domain . "\n") !== false) {
                        $message = "Domain added successfully.";
                    } else {
                        $message = "Error: Could not write to the file.";
                    }
                    // Release the lock
                    flock($fp, LOCK_UN);
                } else {
                    $message = "Error: Could not lock the file.";
                }
                fclose($fp);
            } else {
                $message = "Error: File is not writable or does not exist.";
            }
        } else {
            $message = "Invalid domain. Please enter a valid domain (e.g., example.com).";
        }
    } else {
        $message = "Please enter a domain.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Blocked Domain</title>
</head>
<body>
    <h1>Add a Blocked Domain</h1>
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="domain">Domain:</label>
        <input type="text" id="domain" name="domain" placeholder="example.com" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
