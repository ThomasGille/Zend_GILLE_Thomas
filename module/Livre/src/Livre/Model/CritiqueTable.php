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
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row for user $idUser");
        }
        return $row;
    }

    public function saveCritique(Critique $critique) {
        echo "bonjour";
        $data = array(
            'idUser' => $critique->idUser,
            'idLivre' => $critique->idLivre,
            'Note' => $critique->Note,

        );
        $data2;
        $data2[] = (int) $critique->idUser;
        $data2[] = (int) $critique->idLivre;
        $data2[] = (int) $critique->Note;

        echo "allo";
        $this->tableGateway->insert($data2);

        if ($this->getCritique($idUser, $idLivre)) {
            echo "pas ajout?";
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
