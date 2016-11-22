<?php

/**
 * BaseUserResetPW
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property bigint $user_id
 * @property string $verify_code
 * @property integer $expried_time
 * @property string $mo_id
 * @property string $msisdn
 * 
 * @method bigint      getUserId()       Returns the current record's "user_id" value
 * @method string      getVerifyCode()   Returns the current record's "verify_code" value
 * @method integer     getExpriedTime()  Returns the current record's "expried_time" value
 * @method string      getMoId()         Returns the current record's "mo_id" value
 * @method string      getMsisdn()       Returns the current record's "msisdn" value
 * @method UserResetPW setUserId()       Sets the current record's "user_id" value
 * @method UserResetPW setVerifyCode()   Sets the current record's "verify_code" value
 * @method UserResetPW setExpriedTime()  Sets the current record's "expried_time" value
 * @method UserResetPW setMoId()         Sets the current record's "mo_id" value
 * @method UserResetPW setMsisdn()       Sets the current record's "msisdn" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUserResetPW extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('user_reset_pw');
        $this->hasColumn('user_id', 'bigint', 20, array(
             'type' => 'bigint',
             'notnull' => true,
             'comment' => '',
             'length' => 20,
             ));
        $this->hasColumn('verify_code', 'string', 32, array(
             'type' => 'string',
             'comment' => 'Mệnh giá thẻ cào hoặc giá niêm yết của hiện vật',
             'length' => 32,
             ));
        $this->hasColumn('expried_time', 'integer', 13, array(
             'type' => 'integer',
             'notnull' => true,
             'comment' => '',
             'length' => 13,
             ));
        $this->hasColumn('mo_id', 'string', 256, array(
             'type' => 'string',
             'notnull' => true,
             'comment' => 'map voi bang mo_log',
             'length' => 256,
             ));
        $this->hasColumn('msisdn', 'string', 15, array(
             'type' => 'string',
             'comment' => '',
             'length' => 15,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}