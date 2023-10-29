<?php

use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    public function testSearchReturnsExpectedData()
    {
        $_POST['searchTerm'] = 'CountryA';
        ob_start();
        include '../search.php';
        $output = ob_get_clean();
        $result = json_decode($output, true);

        $this->assertIsArray($result);
        $this->assertNotEmpty($result);
        $this->assertEquals('CountryA', $result[0]['name']);
    }
}
