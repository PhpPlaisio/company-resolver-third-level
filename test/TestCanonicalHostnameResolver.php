<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\CompanyResolver\Test;

use SetBased\Abc\CanonicalHostnameResolver\CanonicalHostnameResolver;

/**
 * A CanonicalHostnameResolver for testing ThirdLevelCompanyResolver.
 */
class TestCanonicalHostnameResolver implements CanonicalHostnameResolver
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The canonical host name.
   *
   * @var string|null
   */
  public static $canonicalHostname;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the canonical hostname (a.k.a. preferred fully qualified domain name).
   *
   * @return string
   *
   * @api
   * @since 1.0.0
   */
  public function getCanonicalHostname()
  {
    return self::$canonicalHostname;
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
