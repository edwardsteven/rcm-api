<?php

namespace EdwardSteven\RCMAPI\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Fluent;

/**
 * @property int $vehiclecategorytypeid;
 * @property int $pickuplocationid;
 * @property string $pickupdate;
 * @property string $pickuptime;
 * @property int $dropofflocationid;
 * @property string $dropoffdate;
 * @property string $dropofftime;
 * @property int $ageid;
 * @property int $vehiclecategoryid;
 * @property int $bookingtype;
 * @property int $insuranceid;
 * @property int $extrakmsid;
 * @property int $transmission;
 * @property int $numbertravelling;
 * @property Customer $customer;
 * @property int $emailoption;
 * @property int $referralid;
 * @property string $campaigncode;
 * @property string $agentcode;
 * @property string $agentname;
 * @property string $agentemail;
 * @property string $agentrefno;
 * @property int $foundusid;
 * @property string $remark;
 * @property string $flightin;
 * @property string $flightout;
 * @property string $arrivalpoint;
 * @property string $departurepoint;
 * @property int $areaofuseid;
 * @property bool $newsletter;
 * @property string $refno;
 * @property Customer $extradriver;
 * @property Collection $optionalfees
 * @property Carbon $pickupdatetime;
 * @property Carbon $dropoffdatetime
 * @property float $dailyrate
 */

class Booking {

    protected Fluent $params;

    protected array $requiredKeys = ["vehiclecategorytypeid", "pickuplocationid", "pickupdate", "pickuptime", "dropofflocationid", "dropoffdate", "dropofftime", "ageid", "vehiclecategoryid", "bookingtype", "insuranceid", "extrakmsid", "transmission", "numbertravelling", "customer"];

    protected array $optionalKeys = ["dailyrate", "emailoption", "referralid", "campaigncode", "agentcode", "agentname", "agentemail", "agentrefno", "foundusid", "remark", "flightin", "flightout", "arrivalpoint", "departurepoint", "areaofuseid", "newsletter", "refno", "extradriver", "optionalfees",];

    protected array $specialKeys = ['pickupdatetime', 'dropoffdatetime'];

    public function __construct($params = []){

        $this->params = new Fluent(array_merge([
            'dailyrate' => 0,
            'emailoption' => 0,
            'optionalfees' => [],
            'numbertravelling' => 1,
            'transmission' => 0
        ], $params));

    }

    public function set($key, $value){

        if(!in_array($key, $this->allowedKeys(), true)){
            throw new \Exception("The key {$key} does not exist on the booking object");
        }

        $this->params[$key] = $value;

        if(in_array($key, $this->specialKeys, true)){
            $this->handleSpecialKey($key, $value);
        }

    }

    protected function handleSpecialKey($key, $value){
        switch($key){
            case 'pickupdatetime':
                $this->params['pickupdate'] = Carbon::parse($value)->format('d/m/Y');
                $this->params['pickuptime'] = Carbon::parse($value)->format('H:i');
                return;
            case 'dropoffdatetime':
                $this->params['dropoffdate'] = Carbon::parse($value)->format('d/m/Y');
                $this->params['dropofftime'] = Carbon::parse($value)->format('H:i');
        }
    }


    public function get($key){
        return $this->params[$key];
    }

    public function toArray(){

        return collect($this->params)->filter(function($item, $key){

            return $item !== null && !in_array($key, $this->specialKeys, true);

        })->map(function($item, $key){

            if($key === 'customer' && is_a($item, Customer::class)){
                return $item->toArray();
            }

            return $item;
        })->toArray();

    }

    public function isValid(){

        foreach($this->params as $key=>$param){
            if(!in_array($key, $this->allowedKeys(), true)){
                return false;
            }
        }

        return true;
    }

    protected function allowedKeys(){
        return array_merge($this->requiredKeys, $this->optionalKeys, $this->specialKeys);
    }

    public function __get($key){
        return $this->params[$key];
    }

    public function __set($key, $value){
        $this->set($key, $value);
    }

    public function __isset($key){
        return isset($this->params[$key]);
    }


}
