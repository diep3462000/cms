<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CmsCategory', 'doctrine');

/**
 * BaseCmsCategory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $categoryid
 * @property string $title
 * @property string $menutext
 * @property integer $parentid
 * @property string $url
 * @property string $description
 * @property timestamp $createdtime
 * @property timestamp $modifiedtime
 * @property string $author
 * @property integer $ismenu
 * @property integer $status
 * 
 * @method integer     getCategoryid()   Returns the current record's "categoryid" value
 * @method string      getTitle()        Returns the current record's "title" value
 * @method string      getMenutext()     Returns the current record's "menutext" value
 * @method integer     getParentid()     Returns the current record's "parentid" value
 * @method string      getUrl()          Returns the current record's "url" value
 * @method string      getDescription()  Returns the current record's "description" value
 * @method timestamp   getCreatedtime()  Returns the current record's "createdtime" value
 * @method timestamp   getModifiedtime() Returns the current record's "modifiedtime" value
 * @method string      getAuthor()       Returns the current record's "author" value
 * @method integer     getIsmenu()       Returns the current record's "ismenu" value
 * @method integer     getStatus()       Returns the current record's "status" value
 * @method CmsCategory setCategoryid()   Sets the current record's "categoryid" value
 * @method CmsCategory setTitle()        Sets the current record's "title" value
 * @method CmsCategory setMenutext()     Sets the current record's "menutext" value
 * @method CmsCategory setParentid()     Sets the current record's "parentid" value
 * @method CmsCategory setUrl()          Sets the current record's "url" value
 * @method CmsCategory setDescription()  Sets the current record's "description" value
 * @method CmsCategory setCreatedtime()  Sets the current record's "createdtime" value
 * @method CmsCategory setModifiedtime() Sets the current record's "modifiedtime" value
 * @method CmsCategory setAuthor()       Sets the current record's "author" value
 * @method CmsCategory setIsmenu()       Sets the current record's "ismenu" value
 * @method CmsCategory setStatus()       Sets the current record's "status" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     ngoctv1
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCmsCategory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('cms_category');
        $this->hasColumn('categoryid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('menutext', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('parentid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('createdtime', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('modifiedtime', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('author', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('ismenu', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}