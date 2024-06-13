<?php
header('Content-Type: application/json');

function generateRefcode() {
    return uniqid('', true);
}

function sendResponse($status, $phone_number, $mobile_network, $message) {
    $response = array(
        'phone_number' => $phone_number,
        'mobile_network' => $mobile_network,
        'status' => $status,
        'message' => $message
    );
    echo json_encode($response);
    exit();
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    sendResponse('failure', '', '', 'Invalid request method');
}

// Get the input data
$input = json_decode(file_get_contents('php://input'), true);

// Validate input data
if (!isset($input['phone_number']) || !isset($input['mobile_network']) || !isset($input['message'])) {
    sendResponse('failure', '', '', 'Missing parameters');
}

$phone_number = $input['phone_number'];
$mobile_network = $input['mobile_network'];
$message = $input['message'];

// Generate a unique refcode (for internal use, not included in response)
$refcode = generateRefcode();

// Simulate storing the message (in a real application, store it in a database)
$messages = array();
$messages[$refcode] = array(
    'phone_number' => $phone_number,
    'mobile_network' => $mobile_network,
    'message' => $message
);

// Send a successful response
sendResponse('success', $phone_number, $mobile_network, 'Registration successful');
?>