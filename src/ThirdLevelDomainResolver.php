<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\DomainResolver;

use SetBased\Abc\Abc;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Domain resolver for websites were the domain (a.k.a. company name) is the third level domain name.
 */
class ThirdLevelDomainResolver implements DomainResolver
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The domain (a.k.a. company abbreviation).
   *
   * @var string
   */
  private $domain;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @api
   * @since 1.0.0
   */
  public function __construct()
  {
    $this->setDomain();
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the domain (a.k.a. company abbreviation) based on the third level domain name.
   *
   * @return string
   *
   * @api
   * @since 1.0.0
   */
  public function getDomain()
  {
    return $this->domain;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Sets the domain (a.k.a. company abbreviation) based on the third-level domain of the canonical host name.
   */
  private function setDomain()
  {
    $parts = explode('.', Abc::getInstance()->getCanonicalServerName());
    if (count($parts)==3 && $parts[0]!='www')
    {
      $this->domain = strtoupper($parts[0]);
    }
    else
    {
      $this->domain = 'SYS';
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
