<?php
declare(strict_types=1);

namespace Plaisio\CompanyResolver\Test;

use Plaisio\CanonicalHostnameResolver\CanonicalHostnameResolver;

/**
 * A CanonicalHostnameResolver for testing ThirdLevelCompanyResolver.
 */
class TestCanonicalHostnameResolver implements CanonicalHostnameResolver
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The canonical host name.
   *
   * @var string
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
  public function getCanonicalHostname(): string
  {
    return self::$canonicalHostname;
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
