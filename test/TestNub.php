<?php
declare(strict_types=1);

namespace Plaisio\CompanyResolver\Test;

use Plaisio\CompanyResolver\ThirdLevelCompanyResolver;
use Plaisio\Kernel\Nub;

/**
 * Concrete implementation of Abc for test purposes.
 */
class TestNub extends Nub
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   */
  public function __construct()
  {
    parent::__construct();

    self::$companyResolver           = new ThirdLevelCompanyResolver(T::CMP_ID_SYS);
    self::$canonicalHostnameResolver = new TestCanonicalHostnameResolver();
    self::$DL                        = new TestDataLayer();
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
