<?php



use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    // every function should have prefix 'test', otherwise it won't work or use line below instead:
    /** @test */

    public function Nums()
    {
        $a = 5;
        $b = 5;

        $this->assertTrue($a==$b, 'Bool test');
        $this->assertEquals($a*$b, 25, 'Equals test');
        
    }
}




?>