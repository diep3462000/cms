<?php

/**
 * BaseExchangeAsset
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $assetId
 * @property bigint $name
 * @property string $parValue
 * @property integer $cashValue
 * @property string $trustedIndex
 * @property string $provider
 * @property integer $type
 * @property integer $active
 * @property string $description
 * 
 * @method integer       getAssetId()      Returns the current record's "assetId" value
 * @method bigint        getName()         Returns the current record's "name" value
 * @method string        getParValue()     Returns the current record's "parValue" value
 * @method integer       getCashValue()    Returns the current record's "cashValue" value
 * @method string        getTrustedIndex() Returns the current record's "trustedIndex" value
 * @method string        getProvider()     Returns the current record's "provider" value
 * @method integer       getType()         Returns the current record's "type" value
 * @method integer       getActive()       Returns the current record's "active" value
 * @method string        getDescription()  Returns the current record's "description" value
 * @method ExchangeAsset setAssetId()      Sets the current record's "assetId" value
 * @method ExchangeAsset setName()         Sets the current record's "name" value
 * @method ExchangeAsset setParValue()     Sets the current record's "parValue" value
 * @method ExchangeAsset setCashValue()    Sets the current record's "cashValue" value
 * @method ExchangeAsset setTrustedIndex() Sets the current record's "trustedIndex" value
 * @method ExchangeAsset setProvider()     Sets the current record's "provider" value
 * @method ExchangeAsset setType()         Sets the current record's "type" value
 * @method ExchangeAsset setActive()       Sets the current record's "active" value
 * @method ExchangeAsset setDescription()  Sets the current record's "description" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseExchangeAsset extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('exchange_asset');
        $this->hasColumn('assetId', 'integer', 11, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 11,
             ));
        $this->hasColumn('name', 'bigint', 20, array(
             'type' => 'bigint',
             'notnull' => true,
             'comment' => '',
             'length' => 20,
             ));
        $this->hasColumn('parValue', 'string', 32, array(
             'type' => 'string',
             'comment' => 'Mệnh giá thẻ cào hoặc giá niêm yết của hiện vật',
             'length' => 32,
             ));
        $this->hasColumn('cashValue', 'integer', 13, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => '',
             'length' => 13,
             ));
        $this->hasColumn('trustedIndex', 'string', 256, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'điểm tín nhiệm sẽ bị giảm đi',
             'length' => 256,
             ));
        $this->hasColumn('provider', 'string', 12, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'nhà cung cấp, nếu là trường hợp thẻ cào thì là mã nhà cung cấp',
             'length' => 12,
             ));
        $this->hasColumn('type', 'integer', 11, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => '1: thẻ cào, 2: hiện vật',
             'length' => 11,
             ));
        $this->hasColumn('active', 'integer', 1, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => '',
             'length' => 1,
             ));
        $this->hasColumn('description', 'string', 256, array(
             'type' => 'string',
             'comment' => '',
             'length' => 256,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}