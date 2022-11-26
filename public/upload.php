<?php
$maxsize = 555242880; // 5MB
$result = [
    'status' => 'ERROR',
    'data' => ''
];
if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != '') {
    $name = $_FILES['file']['name'];
    $target_dir = "";
    $target_file = $target_dir . $_FILES["file"]["name"];

    // Select file type
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg","mkv");

    // Check extension
    if (in_array($extension, $extensions_arr)) {

        // Check file size
        if (($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
            $result['data'] = "File too large. File must be less than 5MB.";
        } else {
            // Upload
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                $result['status'] = 'OK';
                $result['data'] = 'https://hoynovelas.net/'.$target_file;
            }
        }
    } else {
        $result['data'] = "Invalid file extension.";
    }
} else {
    $result['data'] = "Please select a file.";
}
echo json_encode($result);
exit;
