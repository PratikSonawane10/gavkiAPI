<?php
require_once '../dao/RegistrationDetailDAO.php';

class RegistrationDetail
{
	private $username;
    private $firstname;
    private $lastname;
	private $email;
    private $panCardNo;
    private $vat_tin_servicetax_no;
	private $cst;
	private $mobile;
    private $telephone;
    private $bankifscCode;
	private $bankName;
    private $bankAddress;
    private $benifiaciaryName;
	private $acountNo;
	private $typeOfAccount;
    private $payEmail;
    private $whatsappNo;
	private $companyName;
	private $companyId;
    private $companyAddress1;
    private $companyAddress2;
	private $companyCity;
	private $companyPostCode;
    private $companyCountry;
    private $companyState;
	private $websiteURL;
    private $companyDescription;
    private $primaryCategory;
	private $subCategory;
	private $product;
	
    public function setUsername($username) {
        $this->username = $username;
    }    
    public function getUsername() {
        return $this->username;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }    
    public function getFirstname() {
        return $this->firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }	
    public function getLastname() {
        return $this->lastname;
    }
	
	 public function setEmail($email) {
        $this->email = $email;
    }    
    public function getEmail() {
        return $this->email;
    }
	    
	public function setPanCardNo($panCardNo) {
        $this->panCardNo = $panCardNo;
    }
	 public function getPanCardNo() {
        return $this->panCardNo;
    }
	
    public function setVat_tin_servicetax_no($vat_tin_servicetax_no) {
        $this->vat_tin_servicetax_no = $vat_tin_servicetax_no;
    }
    
    public function getVat_tin_servicetax_no() {
        return $this->vat_tin_servicetax_no;
    }
   
	public function setCst($cst) {
        $this->cst = $cst;
    }
    public function getCst() {
        return $this->cst;
		
    }
	 public function setMobile($mobile) {
        $this->mobile = $mobile;
    }
    public function getMobile() {
        return $this->mobile;
    }
	
	public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
    public function getTelephone() {
        return $this->telephone;
    }
	
	public function setBankifscCode($bankifscCode) {
        $this->bankifscCode = $bankifscCode;
    }   
    public function getBankifscCode() {
        return $this->bankifscCode;
    }
  
   public function setBankName($bankName) {
        $this->bankName = $bankName;
    }    
    public function getBankName() {
        return $this->bankName;
    }
	
	public function setBankAddress($bankAddress) {
        $this->bankAddress = $bankAddress;
    }    
    public function getBankAddress() {
        return $this->bankAddress;
    }
	
	public function setBenifiaciaryName($benifiaciaryName) {
        $this->benifiaciaryName = $benifiaciaryName;
    }    
    public function getBenifiaciaryName() {
        return $this->benifiaciaryName;
    }
   
	public function setAcountNo($acountNo) {
        $this->acountNo = $acountNo;
    }    
    public function getAcountNo() {
        return $this->acountNo;
    }
	
	public function setTypeOfAccount($typeOfAccount) {
        $this->typeOfAccount = $typeOfAccount;
    }    
    public function getTypeOfAccount() {
        return $this->typeOfAccount;
    }
	
	public function setPayEmail($payEmail) {
        $this->payEmail = $payEmail;
    }    
    public function getPayEmail() {
        return $this->payEmail;
    }
	
	public function setWhatsappNo($whatsappNo) {
        $this->whatsappNo = $whatsappNo;
    }    
    public function getWhatsappNo() {
        return $this->whatsappNo;
    }
	
   public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }    
    public function getCompanyName() {
        return $this->companyName;
    }
	public function setCompanyId($companyId) {
        $this->companyId = $companyId;
    }    
    public function getCompanyId() {
        return $this->companyId;
    }
    
	public function setCompanyAddress1($companyAddress1) {
        $this->companyAddress1 = $companyAddress1;
    }    
    public function getCompanyAddress1() {
        return $this->companyAddress1;
    }
	
	public function setCompanyAddress2($companyAddress2) {
        $this->companyAddress2 = $companyAddress2;
    }    
    public function getCompanyAddress2() {
        return $this->companyAddress2;
    }
	public function setCompanyCity($companyCity) {
        $this->companyCity = $companyCity;
    }    
    public function getCompanyCity() {
        return $this->companyCity;
    }
	
	public function setCompanyPostCode($companyPostCode) {
        $this->companyPostCode = $companyPostCode;
    }    
    public function getCompanyPostCode() {
        return $this->companyPostCode;
    }
  
	public function setCompanyCountry($companyCountry) {
        $this->companyCountry = $companyCountry;
    }    
    public function getCompanyCountry() {
        return $this->companyCountry;
    }
	
    public function setCompanyState($companyState) {
        $this->companyState = $companyState;
    }    
    public function getCompanyState() {
        return $this->companyState;
    }
	
   public function setWebsiteURL($websiteURL) {
        $this->websiteURL = $websiteURL;
    }    
    public function getWebsiteURL() {
        return $this->websiteURL;
    }
	
	public function setCompanyDescription($companyDescription) {
        $this->companyDescription = $companyDescription;
    }    
    public function getCompanyDescription() {
        return $this->companyDescription;
    }
   
   public function setPrimaryCategory($primaryCategory) {
        $this->primaryCategory = $primaryCategory;
    }    
    public function getPrimaryCategory() {
        return $this->primaryCategory;
    }
	
    public function setSubCategory($subCategory) {
        $this->subCategory = $subCategory;
    }    
    public function getSubCategory() {
        return $this->subCategory;
    }
	
	public function setProduct($product) {
        $this->product = $product;
    }    
    public function getProduct() {
        return $this->product;
    }
	
	
    
	//public function mapIncomingRegistrationDetailsParams( $username, $firstname, $lastname, $email, $panCardNo, $vat_tin_servicetax_no, $cst, $mobile,$telephone,$bankifscCode, $bankName, $bankAddress, $benifiaciaryName, $acountNo, $typeOfAccount, $payEmail, $whatsappNo, $companyName,$companyId, $companyAddress1, $companyAddress2, $companyCity, $companyPostCode, $companyState, $websiteURL, $companyDescription, $primaryCategory, $subCategory,$product) 
    public function mapIncomingRegistrationDetailsParams($firstname,$lastname,$email,$mobile,$whatsappNo,$panCardNo,$vat_tin_servicetax_no,$bankAddress,$companyPostCode,$product)
	{	
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
		$this->setEmail($email);
		$this->setMobile($mobile);
		$this->setWhatsappNo($whatsappNo);
		$this->setPanCardNo($panCardNo);
        $this->setVat_tin_servicetax_no($vat_tin_servicetax_no);
		$this->setBankAddress($bankAddress);
		$this->setCompanyPostCode($companyPostCode);
		$this->setProduct($product);
	}
		/*
		$this->setCst($cst);		
		$this->setUsername($username);
        $this->setBankifscCode($bankifscCode);
        $this->setBankName($bankName);		
        $this->setBenifiaciaryName($benifiaciaryName);
        $this->setAcountNo($acountNo);
		$this->settypeOfAccount($typeOfAccount);
		$this->setPayEmail($payEmail);        
        $this->setCompanyName($companyName);
		$this->setCompanyId($companyId);
        $this->setCompanyAddress1($companyAddress1);
        $this->setCompanyAddress2($companyAddress2);
		$this->setCompanyCity($companyCity);		
        $this->setCompanyState($companyState);
        $this->setWebsiteURL($websiteURL);
		$this->setCompanyDescription($companyDescription);
        $this->setPrimaryCategory($primaryCategory);
        $this->setSubCategory($subCategory);
		*/
		
    

    public function savingRegistrationDetails() {
        $saveUsersDetailsDAO = new RegistrationDetailDAO();
        $returnUsersDetailsSaveSuccessMessage = $saveUsersDetailsDAO->saveDetail($this);
        return $returnUsersDetailsSaveSuccessMessage;
    }
    
}
?>