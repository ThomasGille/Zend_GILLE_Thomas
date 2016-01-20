<?php

namespace Livre\Model;

use Zend\Db\TableGateway\TableGateway;

class LivreTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    
    
    public function getLivreByIdUser($id) {
        $idUser = (int) $id;
        $rowset = $this->tableGateway->select(array('idUser' => $idUser));
        if (!$rowset) {
            throw new \Exception("Could not find row $idUser");
        }
        return $rowset;
    }

    public function getLivre($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveLivre(Livre $livre) {
        $data = array(
            'artist' => $livre->artist,
            'title' => $livre->title,
        );

        $id = (int) $livre->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getLivre($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Livre id does not exist');
            }
        }
    }

    public function deleteLivre($id) {
        $this->tableGateway->delete(array('id' => (int) $id));
    }

}
