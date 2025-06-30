<?php
declare(strict_types=1);

namespace Plaisio\CompanyResolver\Test\Plaisio;

use Plaisio\CanonicalHostnameResolver\CanonicalHostnameResolver;

/**
 * A CanonicalHostnameResolver for testing ThirdLevelCompanyResolver.
 */
#[\AllowDynamicProperties]
class TestCanonicalHostnameResolver implements CanonicalHostnameResolver
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The canonical host name.
   *
   * @var string
   */
  public static string $staticHostname;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the value of a property.
   *
   * Do not call this method directly as it is a PHP magic method that
   * will be implicitly called when executing `$value = $object->property;`.
   *
   * @param string $property The name of the property.
   *
   * @return mixed The value of the property.
   *
   * @throws \LogicException If the property is not defined.
   */
  public function __get(string $property)
  {
    $getter = 'get'.ucfirst($property);
    if (method_exists($this, $getter))
    {
      return $this->$property = $this->$getter();
    }

    throw new \LogicException(sprintf('Unknown property %s::%s', __CLASS__, $property));
  }

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
    return self::$staticHostname;
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
