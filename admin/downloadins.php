<?php
if(isset($_GET['id'])) {
    $fileId = $_GET['id'];
    include 'connection.php';

    $sql = "SELECT filename FROM institution WHERE iid = $fileId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $zip = new ZipArchive();
        $zipFileName = "files.zip";

        if ($zip->open($zipFileName, ZipArchive::CREATE) === true) {
            $row = $result->fetch_assoc();
            $fileNames = explode(",", $row['filename']);

            foreach ($fileNames as $fileName) {
                $filePath = "../institutionuploads/" . trim($fileName);

                if (file_exists($filePath)) {
                    // Add file to zip
                    $zip->addFile($filePath, basename($filePath));
                } else {
                    echo "File not found: $fileName<br>";
                }
            }

            $zip->close();

            // Output headers for file download
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $zipFileName . '"');
            header('Content-Length: ' . filesize($zipFileName));
            header('Pragma: public');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Expires: 0');
            readfile($zipFileName);
            unlink($zipFileName); // Delete the temporary zip file after download
            exit;
        } else {
            echo "Failed to create ZIP file.";
        }
    } else {
        echo "File not found.";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>*/