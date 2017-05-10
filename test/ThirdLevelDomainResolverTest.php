<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\DomainResolver\Test;

use PHPUnit\Framework\TestCase;

//----------------------------------------------------------------------------------------------------------------------
class ThirdLevelDomainResolverTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with proper third level domain.
   */
  public function testGetDomain1()
  {
    $_SERVER['HTTP_HOST'] = 'domain.example.com';
    $abc                  = new Framework();

    $this->assertSame('DOMAIN', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as third level domain.
   */
  public function testGetDomain2()
  {
    $_SERVER['HTTP_HOST'] = 'www.example.com';
    $abc                  = new Framework();

    $this->assertSame('SYS', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as second level domain.
   */
  public function testGetDomain3()
  {
    $_SERVER['HTTP_HOST'] = 'example.com';
    $abc                  = new Framework();

    $this->assertSame('SYS', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as forth level domain.
   */
  public function testGetDomain4()
  {
    $_SERVER['HTTP_HOST'] = 'x.y.example.com';
    $abc                  = new Framework();

    $this->assertSame('SYS', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
