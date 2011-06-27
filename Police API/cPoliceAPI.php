<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cPoliceAPI
 *
 * @author Andy
 */
class cPoliceAPI {
    //put your code here

    private $username;
    private $password;

    private $apiURL = 'http://policeapi2.rkh.co.uk/api/';

    function  __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    function getUsername(){
        return $this->username;
    }
    
    function getPassword(){
        return $this->password;
    }

    function getAPIURL(){
        return $this->apiURL;
    }

    function authRequest($requestURL){
        $ch = curl_init($this->getAPIURL() . $requestURL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->getUsername() . ":" . $this->getPassword());
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Sample Code');
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        $output = curl_exec($ch);
        //print_r(curl_getinfo($ch));
        curl_close($ch);
        return $output;
    }

    /***
     * http://policeapi2.rkh.co.uk/api/docs/method/force/<br/>
     * Tag                 Description<br/>
        url                 Force website URL<br/>
        engagement-methods	Ways to keep informed<br/>
            url                 Method website URL<br/>
            description         Method description<br/>
            title               Method title<br/>
        telephone           Force telephone number<br/>
        id                  Unique force identifier<br/>
        name                Force name<br/>
     */

    function getForces()
    {
        return $this->authRequest('forces');
    }

    function getForceByCounty($county){
        return $this->authRequest('forces/' . $county);
    }

    function getNeighbourhoodCrimes($county, $neighbourhoodId){
        return $this->authRequest($county . '/' . $neighbourhoodId . '/crime');
    }

    function getStreetLevelCrimes($latitude, $longitude){
        return $this->authRequest('/crimes-street/all-crime?lat=' . $latitude . '&lng=' . $longitude);
    }

    function getCrimeCategories(){
        return $this->authRequest('crime-categories');
    }

    function getDateOfLastUpdated(){
        return $this->authRequest('crime-last-updated');
    }

    function getNeighbourhoodsByCounty($county) {
        return $this->authRequest($county . '/neighbourhoods');
    }

    function getNeighbourhoodById($county, $neighbourhoodId){
        return $this->authRequest($county . '/' . $neighbourhoodId);
    }

    function getNeighbourhoodTeam($county, $neighbourhoodId){
        return $this->authRequest($county . '/' . $neighbourhoodId . '/people');
    }

    function getNeighbourhoodEvents($county, $neighbourhoodId){
        return $this->authRequest($county . '/' . $neighbourhoodId . '/events');
    }

    function locateNeighbourhood($latitude, $longitude){
        return $this->authRequest('locate-neighbourhood?q=' . $latitude . ',' . $longitude);
    }
    
}
?>
