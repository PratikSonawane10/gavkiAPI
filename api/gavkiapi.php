<?php

require_once '../model/RegistrationDetail.php';
require_once '../model/AddCustomerDetails.php';



function deliver_response($format, $api_response, $isSaveQuery) {

    // Define HTTP responses
    $http_response_code = array(200 => 'OK', 400 => 'Bad Request', 401 => 'Unauthorized', 403 => 'Forbidden', 404 => 'Not Found');

    // Set HTTP Response
    header('HTTP/1.1 ' . $api_response['status'] . ' ' . $http_response_code[$api_response['status']]);

    // Process different content types
    if (strcasecmp($format, 'json') == 0) {

        // Set HTTP Response Content Type
        header('Content-Type: application/json; charset=utf-8');

        // Format data into a JSON response
        $json_response = json_encode($api_response);
        
        // Deliver formatted data
        echo $json_response;

    } elseif (strcasecmp($format, 'xml') == 0) {

        // Set HTTP Response Content Type
        header('Content-Type: application/xml; charset=utf-8');

        // Format data into an XML response (This is only good at handling string data, not arrays)
        $xml_response = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" . '<response>' . "\n" . "\t" . '<code>' . $api_response['code'] . '</code>' . "\n" . "\t" . '<data>' . $api_response['data'] . '</data>' . "\n" . '</response>';

        // Deliver formatted data
        echo $xml_response;

    } else {

        // Set HTTP Response Content Type (This is only good at handling string data, not arrays)
        header('Content-Type: text/html; charset=utf-8');

        // Deliver formatted data
        echo $api_response['data'];

    }

    // End script process
    exit ;

}

// Define whether an HTTPS connection is required
$HTTPS_required = FALSE;

// Define whether user authentication is required
$authentication_required = FALSE;

// Define API response codes and their related HTTP response
$api_response_code = array(0 => array('HTTP Response' => 400, 'Message' => 'Unknown Error'), 1 => array('HTTP Response' => 200, 'Message' => 'Success'), 2 => array('HTTP Response' => 403, 'Message' => 'HTTPS Required'), 3 => array('HTTP Response' => 401, 'Message' => 'Authentication Required'), 4 => array('HTTP Response' => 401, 'Message' => 'Authentication Failed'), 5 => array('HTTP Response' => 404, 'Message' => 'Invalid Request'), 6 => array('HTTP Response' => 400, 'Message' => 'Invalid Response Format'));

// Set default HTTP response of 'ok'
$response['code'] = 0;
$response['status'] = 404;

// --- Step 2: Authorization

// Optionally require connections to be made via HTTPS
if ($HTTPS_required && $_SERVER['HTTPS'] != 'on') {
    $response['code'] = 2;
    $response['status'] = $api_response_code[$response['code']]['HTTP Response'];
    $response['data'] = $api_response_code[$response['code']]['Message'];

    // Return Response to browser. This will exit the script.
    deliver_response($_GET['format'], $response);
}

// Optionally require user authentication
if ($authentication_required) {

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $response['code'] = 3;
        $response['status'] = $api_response_code[$response['code']]['HTTP Response'];
        $response['data'] = $api_response_code[$response['code']]['Message'];

        // Return Response to browser
        deliver_response($_GET['format'], $response);

    }

    // Return an error response if user fails authentication. This is a very simplistic example
    // that should be modified for security in a production environment
    elseif ($_POST['username'] != 'foo' && $_POST['password'] != 'bar') {
        $response['code'] = 4;
        $response['status'] = $api_response_code[$response['code']]['HTTP Response'];
        $response['data'] = $api_response_code[$response['code']]['Message'];

        // Return Response to browser
        deliver_response($_GET['format'], $response);

    }

}

// --- Step 3: Process Request

// Switch based on incoming method
$checkmethod = $_SERVER['REQUEST_METHOD'];
$var = file_get_contents("php://input");
$string = json_decode($var, TRUE);
$method = $string['method'];

if (isset($_POST['method']) || $checkmethod == 'POST') {
	if (strcasecmp($method, 'registration') == 0) {
        $response['code'] = 1;
        $response['status'] = $api_response_code[$response['code']]['HTTP Response'];
        $objRegistrationDetail = new RegistrationDetail();
        //$image_tmp = "";
        //$target_path = "";		
        
        $firstname = $string['firstname'];
        $lastname = $string['lastname'];
        $email = $string['email'];
		$mobile = $string['mobile'];
		$whatsappNo = $string['whatsappNo'];
        $panCardNo = $string['panCardNo'];		
        $vat_tin_servicetax_no = $string['vat_tin_servicetax_no'];
		$bankAddress = $string['bankAddress'];
		$companyPostCode = $string['companyPostCode'];
		$product = $string['product'];
		$objRegistrationDetail->mapIncomingRegistrationDetailsParams($firstname,$lastname,$email,$mobile,$whatsappNo,$panCardNo,$vat_tin_servicetax_no,$bankAddress,$companyPostCode,$product);
		/*$username = $string['username'];
        $cst = $string['cst'];		
        $telephone = $string['telephone'];
        $bankifscCode = $string['bankifscCode'];
        $bankName = $string['bankName'];       
        $benifiaciaryName = $string['benifiaciaryName'];
        $acountNo = $string['acountNo'];
		$typeOfAccount = $string['typeOfAccount'];
        $payEmail = $string['payEmail'];        
        $companyName = $string['companyName'];
        $companyId = $string['companyId'];
        $companyAddress1 = $string['companyAddress1'];
        $companyAddress2 = $string['companyAddress2'];
		$companyCity = $string['companyCity'];        
        $companyCountry = $string['companyCountry'];
        $companyState = $string['companyState'];
        $websiteURL = $string['websiteURL'];
        $companyDescription = $string['companyDescription'];
		$primaryCategory = $string['primaryCategory'];
        $subCategory = $string['subCategory'];
		
		
		/*if(isset($_FILES['petImage'])){
            $image_tmp = $_FILES['petImage']['tmp_name'];
            $image_name = $_FILES['petImage']['name'];
            $target_path = "../pet_images/".basename($image_name);
        }
        $objRegistrationDetail->mapIncomingRegistrationDetailsParams($username, $firstname, $lastname, $email, $panCardNo, $vat_tin_servicetax_no, $cst, $mobile,$telephone, $bankifscCode, $bankName, $bankAddress, $benifiaciaryName, $acountNo, $typeOfAccount, $payEmail, $whatsappNo, $companyName,$companyId, $companyAddress1, $companyAddress2, $companyCity, $companyPostCode, $companyState, $websiteURL, $companyDescription, $primaryCategory, $subCategory,$product);*/
        $response['saveRegistrationDetailsResponse'] = $objRegistrationDetail -> savingRegistrationDetails();
        deliver_response($string['format'], $response, true);
    }
	else if (strcasecmp($method, 'addCustomer') == 0) {
        $response['code'] = 1;
        $response['status'] = $api_response_code[$response['code']]['HTTP Response'];
        $objRegistrationDetail = new AddCustomerDetails();
        $customerName = $string['customerName'];
        $customerContactNo = $string['customerContactNo'];
        $customerEmail = $string['customerEmail'];
		
		$objRegistrationDetail->mapIncomingRegistrationDetailsParams($customerName,$customerContactNo,$customerEmail);
		$response['saveCustomerDetailsResponse'] = $objRegistrationDetail -> savingRegistrationDetails();
        deliver_response($string['format'], $response, true);
	}
    
}
?>
