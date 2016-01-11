<?php

require_once 'BaseDAO.php';
class RegistrationDetailDAO
{
    
    private $con;
    private $msg;
    private $data;
    
    // Attempts to initialize the database connection using the supplied info.
    public function RegistrationDetailDAO() {
        $baseDAO = new BaseDAO();
        $this->con = $baseDAO->getConnection();
    }
    
    public function saveDetail($RegistrationDetail) {
		
        try {			//INSERT INTO vendor_registrations(firstname,lastname,email,mobile,whatsappNo,panCardNo,vat_tin_servicetax_noankAddress,companyPostCode,product,username,cst,telephone,bankifscCode,bankName,b,benifiaciaryName,acountNo,typeOfAccount,payEmail,companyName,companyId,companyAddress1,companyAddress2,companyCity,companyCountry,companyState,websiteURL,companyDescription,primaryCategory,subCategory)
                $sql = "INSERT INTO vendor_registrations(firstname,lastname,email,mobile,whatsappNo,panCardNo,vat_tin_servicetax_no,address,companyPostCode,product)
                        VALUES (
								'".$RegistrationDetail->getFirstname()."', 
								'".$RegistrationDetail->getLastname()."', 
								'".$RegistrationDetail->getEmail()."',
								'".$RegistrationDetail->getMobile()."',
								'".$RegistrationDetail->getWhatsappNo()."',
								'".$RegistrationDetail->getPanCardNo()."', 
								'".$RegistrationDetail->getBankAddress()."',
								'".$RegistrationDetail->getVat_tin_servicetax_no()."', 
								'".$RegistrationDetail->getCompanyPostCode()."',
								'".$RegistrationDetail->getProduct()."'	
								)";
								/*
								'".$RegistrationDetail->getUsername()."'
								'".$RegistrationDetail->getCst()."',								
								'".$RegistrationDetail->getTelephone()."',
								'".$RegistrationDetail->getBankifscCode()."',
								'".$RegistrationDetail->getBankName()."',								
								'".$RegistrationDetail->getBenifiaciaryName()."',
								'".$RegistrationDetail->getAcountNo()."',
								'".$RegistrationDetail->getTypeOfAccount()."',
								'".$RegistrationDetail->getPayEmail()."',								
								'".$RegistrationDetail->getCompanyName()."',
								'".$RegistrationDetail->getCompanyId()."',
								'".$RegistrationDetail->getCompanyAddress1()."',
								'".$RegistrationDetail->getCompanyAddress2()."',
								'".$RegistrationDetail->getCompanyCity()."',								
								'".$RegistrationDetail->getCompanyCountry()."',
								'".$RegistrationDetail->getCompanyState()."',
								'".$RegistrationDetail->getWebsiteURL()."',
								'".$RegistrationDetail->getCompanyDescription()."',
								'".$RegistrationDetail->getPrimaryCategory()."',
								'".$RegistrationDetail->getSubCategory()."' 
									*/
						
        
                $isInserted = mysqli_query($this->con, $sql);
                if ($isInserted) {
					$this->data = "REGISTRATION_DETAILS_SAVED";
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