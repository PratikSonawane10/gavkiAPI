<?php
require_once '../dao/AddCustomerDetailslDAO.php';

class AddCustomerDetails
{
	private $customerName;
    private $customerContactNo;
    private $customerEmail;
	
    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }    
    public function getCustomerName() {
        return $this->customerName;
    }

    public function setCustomerContactNo($customerContactNo) {
        $this->customerContactNo = $customerContactNo;
    }    
    public function getCustomerContactNo() {
        return $this->customerContactNo;
    }

    public function setCustomerEmail($customerEmail) {
        $this->customerEmail = $customerEmail;
    }	
    public function getCustomerEmail() {
        return $this->customerEmail;
    }
	
	
    public function mapIncomingRegistrationDetailsParams($customerName,$customerContactNo,$customerEmail)
	{	
        $this->setCustomerName($customerName);
        $this->setCustomerContactNo($customerContactNo);
		$this->setCustomerEmail($customerEmail);
		
	}
	
    public function savingRegistrationDetails() {
        $saveCustomerDetailsDAO = new AddCustomerDetailslDAO();
        $returnCustomerDetailsSaveSuccessMessage = $saveCustomerDetailsDAO->saveDetail($this);
        return $returnCustomerDetailsSaveSuccessMessage;
    }
    
}
?>