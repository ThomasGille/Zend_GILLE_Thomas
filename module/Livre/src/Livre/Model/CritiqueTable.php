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
    
    /*
     * retourne un boolean
     * Dis si il existe deja une insertion pour cet user et ce livre
     */
    public function estDejaCritique($idUser, $idLivre) {
        $idUser = (int) $idUser;
        $idLivre = (int) $idLivre;

        $rowset = $this->tableGateway->select(array('idUser' => $idUser, 'idLivre' => $idLivre));
        
        $row = $rowset->current();
        //var_dump($row);
        
        return $row;
    }

    public function saveCritique(Critique $critique) {
        
        $data = array(
            'idUser' => $critique->idUser,
            'idLivre' => $critique->idLivre,
            'Note' => $critique->Note,

        );

        
        
        if ($this->estDejaCritique($data['idUser'], $data['idLivre'])) {
            //echo "update";
            $this->tableGateway->update($data, array('idUser' => $data['idUser'], 'idLivre' => $data['idLivre']));
        } else {
            //echo "ajout";
            $this->tableGateway->insert($data);
        }


    }

    public function getAverageMark($idLivre){

        $idLivre = (int) $idLivre;

        // on recupere toutes les notes de ce livre
        $rowset = $this->tableGateway->select(array('idLivre' => $idLivre));

        $moyenne = 0;

        if (count($rowset)) {
            foreach ($rowset as $row) {
                $row = $rowset->current();
                $moyenne += $row->Note;
            }
            $moyenne /= count($rowset);
        }

        return $moyenne;
    }

    public function eraseCritique($idUser, $idLivre) {
        $idUser = (int) $idUser;
        $idLivre = (int) $idLivre;

        echo "$idLivre $idUser";

        $this->tableGateway->delete(array('idUser' => $idUser, 'idLivre' => $idLivre));

    }



}
