<?php

namespace Livre\Model;

use Zend\Db\TableGateway\TableGateway;

class CritiqueTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }


    public function getCritique($idUser, $idLivre) {
        $idUser = (int) $idUser;
        $idLivre = (int) $idLivre;

        $rowset = $this->tableGateway->select(array('idUser' => $idUser, 'idLivre' => $idLivre));
        
        $row = $rowset->current();var_dump($row);
        if (!$row) {
            throw new \Exception("Could not find row for user $idUser");
        }
        return $row;
    }

    public function saveCritique(Critique $critique) {
        
        $data = array(
            'idUser' => $critique->idUser,
            'idLivre' => $critique->idLivre,
            'Note' => $critique->Note,

        );

        
        echo "Patate";
        if ($this->getCritique($data['idUser'], $data['idLivre'])) {
            echo "update";
            $this->tableGateway->update($data, array('idUser' => $idUser, 'idLivre' => $idLivre));
        } else {
            echo "ajout";
            $this->tableGateway->insert($data);
        }


    }

    public function deleteLivre($id) {
        // pas encore modifié // $this->tableGateway->delete(array('id' => (int) $id));
    }

}
