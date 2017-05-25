<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\DomainResolver\Test;

use SetBased\Abc\CanonicalHostnameResolver\CanonicalHostnameResolver;

//----------------------------------------------------------------------------------------------------------------------
/**
 * A CanonicalHostnameResolver for testing ThirdLevelDomainResolver.
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
