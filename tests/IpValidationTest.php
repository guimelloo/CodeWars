<?php
use PHPUnit\Framework\TestCase;

use App\IpValidation;

class IpValidationTest extends TestCase
{    
    public function test_ip_is_valid()
    {
        $validator = new IpValidation;

        $valid = [
            '0.0.0.0',
            '255.255.255.255',
            '238.46.26.43',
            '0.34.82.53',
        ];

        foreach ($valid as $input) {
            $this->assertTrue($validator->isValid($input), "Failed asserting that '$input' is a valid IP4 address.");
        }
    }

    public function test_ip_is_invalid()
    {
        $validator = new IpValidation;

        $invalid = [
            '',
            'abc.def.ghi.jkl',
            '123.456.789.0',
            '1.2.3',
            '03.45.20.1',
            '192.168.00.3'
        ];

        foreach($invalid as $input) {
            $this->assertFalse($validator->isValid($input), "Failed asserting that '$input' is an invalid IP4 address.");
        }
    }
}
