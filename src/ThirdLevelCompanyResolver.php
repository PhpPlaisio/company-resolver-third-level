<?php
declare(strict_types=1);

namespace SetBased\Abc\CompanyResolver;

use SetBased\Abc\Abc;

/**
 * Company resolver for websites were the company abbreviation is the third level domain name.
 */
class ThirdLevelCompanyResolver implements CompanyResolver
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The ID of the company.
   *
   * @var int|null
   */
  private $cmpId;

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
   * @param int $defaultCmpId The default ID of the company.
   *
   * @api
   * @since 1.0.0
   */
  public function __construct(int $defaultCmpId)
  {
    $this->defaultCmpId = $defaultCmpId;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of the company.
   *
   * @return int
   *
   * @api
   * @since 1.0.0
   */
  public function getCmpId(): int
  {
    if ($this->cmpId===null)
    {
      $this->setCompany();
    }

    return $this->cmpId;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Derives the company based on the third-level domain of the canonical host name.
   */
  private function setCompany(): void
  {
    $parts = explode('.', Abc::$canonicalHostnameResolver->getCanonicalHostName());
    if (count($parts)==3 && $parts[0]!='www')
    {
      $this->cmpId = Abc::$DL->abcCompanyGetCmpIdByCmpAbbr($parts[0]) ?? $this->defaultCmpId;
    }
    else
    {
      $this->cmpId = $this->defaultCmpId;
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
