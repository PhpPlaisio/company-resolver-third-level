<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\CompanyResolver\Test;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for ThirdLevelCompanyResolver. Note we set canonical host name after we have created the framework. The
 * domain must not be derived before the first request of the domain.
 */
class ThirdLevelCompanyResolverTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with proper third level domain.
   */
  public function testGetCmpId1()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'domain.example.com';

    $this->assertSame(T::CMP_ID_DOMAIN, $abc::$companyResolver->getCmpId());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as third level domain.
   */
  public function testGetCmpId2()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'www.example.com';

    $this->assertSame(T::CMP_ID_SYS, $abc::$companyResolver->getCmpId());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as second level domain.
   */
  public function testGetCmpId3()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'example.com';

    $this->assertSame(T::CMP_ID_SYS, $abc::$companyResolver->getCmpId());
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as forth level domain.
   */
  public function testGetCmpId4()
  {
    $abc                                              = new TestFramework();
    TestCanonicalHostnameResolver::$canonicalHostname = 'x.y.example.com';

    $this->assertSame(T::CMP_ID_SYS, $abc::$companyResolver->getCmpId());
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
