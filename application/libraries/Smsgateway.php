<?php
defined('BASEPATH') or exit('No direct script access allowed');
/* 
 * Moded Sms Gateway Api
 * By Nikki Sosa 
 * For CodeIgniter
 * Credits to SmsGateway.me
 */
class Smsgateway
{

    static $baseUrl = "https://smsgateway.me";

    var $CI;
    function __construct()
    {

        $this->CI = &get_instance();

        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');

    }

    /* 
     * first initialize account_initialize function
     * before calling other function.
     * for full documentation
     * visit https://smsgateway.me/sms-api-documentation/getting-started
     */

    function account_initialize($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    function createContact($name, $number)
    {
        return $this->makeRequest('/api/v3/contacts/create', 'POST', ['name' => $name, 'number' => $number]);
    }

    function getContacts($page = 1)
    {
        return $this->makeRequest('/api/v3/contacts', 'GET', ['page' => $page]);
    }

    function getContact($id)
    {
        return $this->makeRequest('/api/v3/contacts/view/' . $id, 'GET');
    }


    function getDevices($page = 1)
    {
        return $this->makeRequest('/api/v3/devices', 'GET', ['page' => $page]);
    }

    function getDevice($id)
    {
        return $this->makeRequest('/api/v3/devices/view/' . $id, 'GET');
    }

    function getMessages($page = 1)
    {
        return $this->makeRequest('/api/v3/messages', 'GET', ['page' => $page]);
    }

    function getMessage($id)
    {
        return $this->makeRequest('/api/v3/messages/view/' . $id, 'GET');
    }

    function sendMessageToNumber($to, $message, $device, $options = [])
    {
        $query = array_merge(['number' => $to, 'message' => $message, 'device' => $device], $options);
        return $this->makeRequest('/api/v3/messages/send', 'POST', $query);
    }

    function sendMessageToManyNumbers($to, $message, $device, $options = [])
    {
        $query = array_merge(['number' => $to, 'message' => $message, 'device' => $device], $options);
        return $this->makeRequest('/api/v3/messages/send', 'POST', $query);
    }

    function sendMessageToContact($to, $message, $device, $options = [])
    {
        $query = array_merge(['contact' => $to, 'message' => $message, 'device' => $device], $options);
        return $this->makeRequest('/api/v3/messages/send', 'POST', $query);
    }

    function sendMessageToManyContacts($to, $message, $device, $options = [])
    {
        $query = array_merge(['contact' => $to, 'message' => $message, 'device' => $device], $options);
        return $this->makeRequest('/api/v3/messages/send', 'POST', $query);
    }

    function sendManyMessages($data)
    {
        $query['data'] = $data;
        return $this->makeRequest('/api/v3/messages/send', 'POST', $query);
    }

    private function makeRequest($url, $method, $fields = [])
    {

        $fields['email'] = $this->email;
        $fields['password'] = $this->password;

        $url = smsGateway::$baseUrl . $url;

        $fieldsString = http_build_query($fields);


        $ch = curl_init();

        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, count($fields));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);
        } else {
            $url .= '?' . $fieldsString;
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, false);  // we want headers
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);

        $return['response'] = json_decode($result, true);

        if ($return['response'] == false)
            $return['response'] = $result;

        $return['status'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return $return;
    }
}
