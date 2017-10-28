<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\CompanyResolver\Test;

use SetBased\Abc\Abc;
use SetBased\Abc\CompanyResolver\ThirdLevelCompanyResolver;
use SetBased\Exception\RuntimeException;

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
  /**
   * {@inheritdoc}
   */
  public function createMailMessage()
  {
    throw new RuntimeException('Not implemented');
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * {@inheritdoc}
   */
  public function createNamedLock()
  {
    throw new RuntimeException('Not implemented');
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * {@inheritdoc}
   */
  public function getBlobStore()
  {
    throw new RuntimeException('Not implemented');
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * {@inheritdoc}
   */
  public function getErrorLogger()
  {
    throw new RuntimeException('Not implemented');
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * {@inheritdoc}
   */
  public function getLoginUrl($url)
  {
    throw new RuntimeException('Not implemented');
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
