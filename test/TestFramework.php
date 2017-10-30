<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\CompanyResolver\Test;

use SetBased\Abc\Abc;
use SetBased\Abc\CompanyResolver\ThirdLevelCompanyResolver;

/**
 * Concrete implementation of Abc for test purposes.
 */
class TestFramework extends Abc
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
