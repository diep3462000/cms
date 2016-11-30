<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Provider', 'doctrine');

/**
 * BaseProvider
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $code
 * @property string $description
 * 
 * @method integer  getId()          Returns the current record's "id" value
 * @method string   getCode()        Returns the current record's "code" value
 * @method string   getDescription() Returns the current record's "description" value
 * @method Provider setId()          Sets the current record's "id" value
 * @method Provider setCode()        Sets the current record's "code" value
 * @method Provider setDescription() Sets the current record's "description" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProvider extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('provider');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('code', 'string', 30, array(
             'type' => 'string',
             'comment' => 'mã nhà mạng',
             'length' => 30,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'comment' => 'mô tả',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}