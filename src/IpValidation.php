<?php

namespace App;

class IpValidation
{ 
    public function isValid(string $str): bool
    {
        $splietedIp = explode('.', $str);

        if (count($splietedIp) < 4) {
            return false;
        }

        foreach ($splietedIp as $num) {
            if (str_starts_with($num, '0')) {
                if ($num !== '0') {
                    return false;
                } else {
                    continue;
                }
            }
        }

        for ($i=0; $i < count($splietedIp); $i++) { 
            if (! is_numeric($splietedIp[$i]) || $splietedIp[$i] < 0 || $splietedIp[$i] > 255) {
                return false;
            }
        }

        return true;
    } 
}
