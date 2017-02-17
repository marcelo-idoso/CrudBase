<?php

namespace Site\Navigation\Entity;

use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterAwareInterface;

class MenuCategoria extends AbstractTableGateway
    implements AdapterAwareInterface {

    protected $table = 'categoria' ;
    
    public function setDbAdapter(Adapter $adapter) {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new HydratingResultSet();

        $this->initialize();
    }

    public function fetchAll() {
        $resultSet = $this->select(function (Select $select) {
            $select->order(array('nome asc'));
        });

        $result = $resultSet->toArray();
        
        return $result;
    }

}
