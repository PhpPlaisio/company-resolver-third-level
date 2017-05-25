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
   * Returns the domain (a.k.a. company abbreviation) based on the third level domain name.
   *
   * @return string
   *
   * @api
   * @since 1.0.0
   */
  public function getDomain()
  {
    if ($this->domain===null)
    {
      $this->setDomain();
    }

    return $this->domain;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Derives the domain (a.k.a. company abbreviation) based on the third-level domain of the canonical host name.
   */
  private function setDomain()
  {
    $parts = explode('.', Abc::$canonicalHostnameResolver->getCanonicalHostName());
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
