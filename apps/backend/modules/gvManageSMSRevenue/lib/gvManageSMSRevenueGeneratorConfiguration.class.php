<?php

/**
 * gvManageSMSRevenue module configuration.
 *
 * @package    Vt_Portals
 * @subpackage gvManageSMSRevenue
 * @author     diepth2
 * @version    SVN: $Id: configuration.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class gvManageSMSRevenueGeneratorConfiguration extends BaseGvManageSMSRevenueGeneratorConfiguration
{
    public function getPagerClass(){
        return 'sfDoctrineGroupByPager';
    }
}
