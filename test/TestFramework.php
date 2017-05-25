<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\DomainResolver\Test;

use SetBased\Abc\Abc;
use SetBased\Abc\DomainResolver\ThirdLevelDomainResolver;
use SetBased\Exception\RuntimeException;

//----------------------------------------------------------------------------------------------------------------------
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

    self::$domainResolver = new ThirdLevelDomainResolver();
    self::$canonicalHostnameResolver = new TestCanonicalHostnameResolver();
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
  public function getBlobStore()
  {
    throw new RuntimeException('Not implemented');
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * {@inheritdoc}
   */
  protected function getLoginUrl($url)
  {
    throw new RuntimeException('Not implemented');
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
