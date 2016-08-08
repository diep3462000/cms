<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Suggestion', 'doctrine');

/**
 * BaseSuggestion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $suggestionid
 * @property integer $userid
 * @property string $username
 * @property timestamp $posttime
 * @property string $note
 * 
 * @method integer    getSuggestionid() Returns the current record's "suggestionid" value
 * @method integer    getUserid()       Returns the current record's "userid" value
 * @method string     getUsername()     Returns the current record's "username" value
 * @method timestamp  getPosttime()     Returns the current record's "posttime" value
 * @method string     getNote()         Returns the current record's "note" value
 * @method Suggestion setSuggestionid() Sets the current record's "suggestionid" value
 * @method Suggestion setUserid()       Sets the current record's "userid" value
 * @method Suggestion setUsername()     Sets the current record's "username" value
 * @method Suggestion setPosttime()     Sets the current record's "posttime" value
 * @method Suggestion setNote()         Sets the current record's "note" value
 * 
 * @package    Vt_Portals
 * @subpackage model
 * @author     diepth2
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSuggestion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('suggestion');
        $this->hasColumn('suggestionid', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('userid', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('username', 'string', 75, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 75,
             ));
        $this->hasColumn('posttime', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('note', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}