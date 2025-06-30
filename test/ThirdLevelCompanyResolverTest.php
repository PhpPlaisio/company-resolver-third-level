<?php
declare(strict_types=1);

namespace Plaisio\CompanyResolver\Test;

use PHPUnit\Framework\TestCase;
use Plaisio\CompanyResolver\Test\Plaisio\T;
use Plaisio\CompanyResolver\Test\Plaisio\TestCanonicalHostnameResolver;
use Plaisio\CompanyResolver\Test\Plaisio\TestKernel;
use Plaisio\PlaisioKernel;

/**
 * Test cases for ThirdLevelCompanyResolver. Note we set canonical host name after we have created the framework. The
 * domain must not be derived before the first request of the domain.
 */
class ThirdLevelCompanyResolverTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Our concrete instance of Kernel.
   *
   * @var PlaisioKernel
   */
  private PlaisioKernel $kernel;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @inheritDoc
   */
  public function setUp(): void
  {
    parent::setUpBeforeClass();

    $this->kernel = new TestKernel();
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with proper third level domain.
   */
  public function testGetCmpId1(): void
  {
    TestCanonicalHostnameResolver::$staticHostname = 'domain.example.com';

    $this->assertSame(T::CMP_ID_DOMAIN, $this->kernel->company->cmpId);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as third level domain.
   */
  public function testGetCmpId2(): void
  {
    TestCanonicalHostnameResolver::$staticHostname = 'www.example.com';

    $this->assertSame(T::CMP_ID_SYS, $this->kernel->company->cmpId);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as second level domain.
   */
  public function testGetCmpId3(): void
  {
    TestCanonicalHostnameResolver::$staticHostname = 'example.com';

    $this->assertSame(T::CMP_ID_SYS, $this->kernel->company->cmpId);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with www as forth level domain.
   */
  public function testGetCmpId4(): void
  {
    TestCanonicalHostnameResolver::$staticHostname = 'x.y.example.com';

    $this->assertSame(T::CMP_ID_SYS, $this->kernel->company->cmpId);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
