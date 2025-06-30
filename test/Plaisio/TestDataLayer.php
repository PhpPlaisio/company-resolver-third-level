<?php
declare(strict_types=1);

namespace Plaisio\CompanyResolver\Test\Plaisio;

/**
 * Mockup data layer for testing purposes.
 */
class TestDataLayer
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the ID of a company given an abbreviation of a company.
   *
   * @param string $cmpAbbr The abbreviation of the company.
   *
   * @return int|null
   */
  public function abcCompanyGetCmpIdByCmpAbbr(string $cmpAbbr): ?int
  {
    switch (strtolower($cmpAbbr))
    {
      case 'sys':
        return T::CMP_ID_SYS;

      case 'domain':
        return T::CMP_ID_DOMAIN;

      default:
        return null;
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
