<?php

namespace App\Http\Helpers;

class Location
{

    public static function GetInfo()
    {
        $data = [
            "browser" => self::GetBrowser(),
            "ip_address" => self::GetIPAddress(),
            "time_visit" => date("Y-m-d h:i:s")
        ];
        return $data;
    }

    /**
     * Obtener la dirección IP del visitante
     */
    private static function GetIPAddress()
    {
        $ipAddress = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP']) && self::IsValidIPAddress($_SERVER['HTTP_CLIENT_IP']))
        {
            // check for shared ISP IP
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            // check for IPs passing through proxy servers
            // check if multiple IP addresses are set and take the first one
            $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ipAddressList as $ip)
            {
                if (self::IsValidIPAddress($ip))
                {
                    $ipAddress = $ip;
                    break;
                }
            }
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED']) && self::IsValidIPAddress($_SERVER['HTTP_X_FORWARDED']))
        {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        }
        else if (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && self::IsValidIPAddress($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        {
            $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_FORWARDED_FOR']) && self::IsValidIPAddress($_SERVER['HTTP_FORWARDED_FOR']))
        {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        }
        else if (!empty($_SERVER['HTTP_FORWARDED']) && self::IsValidIPAddress($_SERVER['HTTP_FORWARDED']))
        {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        }
        else if (!empty($_SERVER['REMOTE_ADDR']) && self::IsValidIPAddress($_SERVER['REMOTE_ADDR']))
        {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddress;
    }

    /**
     * Comprueba que la dirección IP sea válida
     */
    private function IsValidIPAddress($ip)
    {
        return (filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4 |
                FILTER_FLAG_IPV6 |
                FILTER_FLAG_NO_PRIV_RANGE |
                FILTER_FLAG_NO_RES_RANGE
        ));
    }

    /**
     * Obtener el navegador
     */
    private function GetBrowser()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }
}
