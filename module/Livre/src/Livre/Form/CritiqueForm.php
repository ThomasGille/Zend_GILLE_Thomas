<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Livre\Form;

use Zend\Form\Form;

class CritiqueForm extends Form {

    public function __construct($name = null) {
        // we want to ignore the name passed
        parent::__construct('critique');

        $this->add(array(
            'name' => 'idUser',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'idLivre',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'Note',
            'type' => 'Hidden',
            'options' => array(
                'label' => 'Auteur',
            ),
        ));
        $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Go',
                 'id' => 'submitbutton',
             ),
         ));
    }

}
