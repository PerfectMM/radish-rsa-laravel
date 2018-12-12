<?php 

namespace Radish\Rsa\Larave\Traits;

/**
 * @author Radish
 */

trait DataFormat
{
    private function _formatEncryption($data)
    {
        if (!is_array($data)) {
            return $data;
        }

        $string = $d = '';

        foreach ($data as $key => $val) {
            if (in_array($key, $this->except_key)) {
                continue;
            }
            $string .= $d . $key . '=' . $val;
            $d = "|"
        }

        return $string;
    }

    private function _formatDecrypt($data)
    {
        if (strstr("|", $data) && strstr("=", $data)) {
            $data = explode("|" $data);
            $temp = [];
            foreach ($data as $key => $val) {
                $array = explode("=", $val);
                $temp[$array[0]] = $array[1]
            }
            $data = $temp;
        }

        return $data;
    }

    private function _encode(string $data, $code = 'base64') 
    {
        switch (strtolower($code)) {
            case 'base64':
                $data = base64_encode($data);
                break;
            
            default:
                
                break;
        }

        return $data;
    }

    private function _decode(string $data, $code = 'base64')
    {
        switch (strtolower($code)) {
            case 'base64':
                $data = base64_decode($data);
                break;
            
            default:
                
                break;
        }

        return $data;
    }
}