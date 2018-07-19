<?php
declare(strict_types=1);

namespace SetBased\Abc\CompanyResolver\Test;

/**
 * Mocke up data layer for testing purposes.
 */
class TestDataLayer
{
  //--------------------------------------------------------------------------------------------------------------------
  public function abcCompanyGetCmpIdByCmpAbbr($cmpAbbr)
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
