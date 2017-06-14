<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\DomainResolver\Test;

use PHPUnit\Framework\TestCase;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Test cases for ThirdLevelDomainResolver. Note we set canonical host name after we have created the framework. The
 * domain must not be derived before the first request of the domain.
 */
class ThirdLevelDomainResolverTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with proper third level domain.
   */
  public function testGetDomain1()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'domain.example.com';

    $this->assertSame('DOMAIN', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as third level domain.
   */
  public function testGetDomain2()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'www.example.com';

    $this->assertSame('SYS', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as second level domain.
   */
  public function testGetDomain3()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'example.com';

    $this->assertSame('SYS', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as forth level domain.
   */
  public function testGetDomain4()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'x.y.example.com';

    $this->assertSame('SYS', $abc::$domainResolver->getDomain());
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
