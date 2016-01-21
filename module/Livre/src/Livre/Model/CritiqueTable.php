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


    public function getCritique($idUser, $idLivre) {
        $idUser = (int) $idUser;
        $idLivre = (int) $idLivre;

        $rowset = $this->tableGateway->select(array('idUser' => $idUser, 'idLivre' => $idLivre));
        $row = $rowset->current();
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

        $idUser = (int) $critique->idUser;
        $idLivre = (int) $critique->idLivre;


        if ($this->getLivre($idUser, $idLivre)) {
            $this->tableGateway->update($data, array('idUser' => $idUser, 'idLivre' => $idLivre));
        } else {
            $this->tableGateway->insert($data);
        }


    }

    public function deleteLivre($id) {
        // pas encore modifié // $this->tableGateway->delete(array('id' => (int) $id));
    }

}
