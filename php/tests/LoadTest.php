<?php

use PHPUnit\Framework\TestCase;

class LoadTest extends TestCase
{
    public function testLoadReturnsExpectedData()
    {
        $_POST['type'] = 'country';
        ob_start();
        include '../load.php';
        $output = ob_get_clean();
        $result = json_decode($output, true);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertEquals('CountryA', $result[0]['name']);
    }
}
