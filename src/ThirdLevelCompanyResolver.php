<?php
declare(strict_types=1);

namespace Plaisio\CompanyResolver;

use Plaisio\PlaisioInterface;
use Plaisio\PlaisioObject;

/**
 * Company resolver for websites were the company abbreviation is the third level domain name.
 */
class ThirdLevelCompanyResolver extends PlaisioObject implements CompanyResolver
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The default ID of the company.
   *
   * @var int
   */
  private $defaultCmpId;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Object constructor.
   *
   * @param PlaisioInterface $object       The parent PhpPlaisio object.
   * @param int              $defaultCmpId The ID of the default company.
   *
   * @api
   * @since 1.0.0
   */
  public function __construct(PlaisioInterface $object, int $defaultCmpId)
  {
    parent::__construct($object);

    $this->defaultCmpId = $defaultCmpId;
  }

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
   * Returns the ID of the company.
   *
   * @return int
   */
  protected function getCmpId(): int
  {
    $parts = explode('.', $this->nub->canonicalHostnameResolver->getCanonicalHostname());
    if (count($parts)==3 && $parts[0]!='www')
    {
      return $this->nub->DL->abcCompanyGetCmpIdByCmpAbbr($parts[0]) ?? $this->defaultCmpId;
    }

    return $this->defaultCmpId;
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
