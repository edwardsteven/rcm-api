<?php

namespace EdwardSteven\RCMAPI\Models;

use Carbon\Carbon;

class Customer
{

    protected $firstName;

    protected $lastName;

    protected $emailAddress;

    protected $phoneNumber;

    protected $mobileNumber;

    protected $dateOfBirth;

    protected $driversLicense;

    protected $licenseNo;

    protected $licenseIssued;

    protected $licenseExpires;

    protected $addressLine1;

    protected $addressLine2;

    protected $state;

    protected $city;

    protected $postcode;

    protected $countryOfResidence;

    protected $fax;

    protected $companyCode;

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param mixed $emailAddress
     * @return Customer
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     * @return Customer
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }

    /**
     * @param mixed $mobileNumber
     * @return Customer
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth() : ?Carbon
    {
        return $this->dateOfBirth;
    }

    /**
     * @param mixed $dateOfBirth
     * @return Customer
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDriversLicense()
    {
        return $this->driversLicense;
    }

    /**
     * @param mixed $driversLicense
     * @return Customer
     */
    public function setDriversLicense($driversLicense)
    {
        $this->driversLicense = $driversLicense;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLicenseNo()
    {
        return $this->licenseNo;
    }

    /**
     * @param mixed $licenseNo
     * @return Customer
     */
    public function setLicenseNo($licenseNo)
    {
        $this->licenseNo = $licenseNo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLicenseIssued()
    {
        return $this->licenseIssued;
    }

    /**
     * @param mixed $licenseIssued
     * @return Customer
     */
    public function setLicenseIssued($licenseIssued)
    {
        $this->licenseIssued = $licenseIssued;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLicenseExpires()
    {
        return $this->licenseExpires;
    }

    /**
     * @param mixed $licenseExpires
     * @return Customer
     */
    public function setLicenseExpires($licenseExpires)
    {
        $this->licenseExpires = $licenseExpires;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->addressLine1;
    }

    /**
     * @param mixed $addressLine1
     * @return Customer
     */
    public function setAddressLine1($addressLine1)
    {
        $this->addressLine1 = $addressLine1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->addressLine2;
    }

    /**
     * @param mixed $addressLine2
     * @return Customer
     */
    public function setAddressLine2($addressLine2)
    {
        $this->addressLine2 = $addressLine2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return Customer
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     * @return Customer
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryOfResidence()
    {
        return $this->countryOfResidence;
    }

    /**
     * @param mixed $countryOfResidence
     * @return Customer
     */
    public function setCountryOfResidence($countryOfResidence)
    {
        $this->countryOfResidence = $countryOfResidence;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     * @return Customer
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompanyCode()
    {
        return $this->companyCode;
    }

    /**
     * @param mixed $companyCode
     * @return Customer
     */
    public function setCompanyCode($companyCode)
    {
        $this->companyCode = $companyCode;
        return $this;
    }

    public function toArray(){

        $arrayToReturn = [
            'firstname'=>$this->getFirstName(),
            'lastname'=>$this->getLastName(),
            'dateofbirth'=>$this->getDateOfBirth() != null ? $this->getDateOfBirth()->format('d/m/Y') : null,
            'licenseno'=>$this->getLicenseNo(),
            'email'=>$this->getEmailAddress(),
            'state'=>$this->getState(),
            'city'=>$this->getCity(),
            'postcode'=>$this->getPostcode(),
            'address'=>$this->getAddressLine1(),
            'country'=>$this->getCountryOfResidence(),
//            'phone'=>$this->getPhoneNumber(),
            'mobile'=> $this->getMobileNumber(),
        ];

        foreach($arrayToReturn as $key=>$value)
        {
            if(is_null($value) || $value == '')
                unset($arrayToReturn[$key]);
        }

        return $arrayToReturn;

    }





}
