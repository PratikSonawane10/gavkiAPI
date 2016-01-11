<?php

require_once 'BaseDAO.php';
class AddCustomerDetailslDAO
{
    
    private $con;
    private $msg;
    private $data;
    
    // Attempts to initialize the database connection using the supplied info.
    public function AddCustomerDetailslDAO() {
        $baseDAO = new BaseDAO();
        $this->con = $baseDAO->getConnection();
    }
    
    public function saveDetail($CustomerDetail) {
		
        try {			
                $sql = "INSERT INTO customer_details(name,mobile,email)
                        VALUES ('".$CustomerDetail->getCustomerName()."','".$CustomerDetail->getCustomerContactNo()."', '".$CustomerDetail->getCustomerEmail()."')";
							
						
        
                $isInserted = mysqli_query($this->con, $sql);
                if ($isInserted) {
					$this->data = "CUSTOMER_DETAILS_SAVED";
                } else {
                    $this->data = "ERROR";
                }
        } catch(Exception $e) {
            echo 'SQL Exception: ' .$e->getMessage();
        }
        return $this->data;
    }
   
}
?>