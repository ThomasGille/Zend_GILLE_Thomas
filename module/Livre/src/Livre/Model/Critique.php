<?php

namespace Livre\Model;
 // Add these import statements
 use Zend\InputFilter\InputFilter;
 use Zend\InputFilter\InputFilterAwareInterface;
 use Zend\InputFilter\InputFilterInterface;

class Critique {

    public $idUser;
    public $idLivre;
    public $Note;
    protected $inputFilter;    
   
    public function exchangeArray($data) {
        $this->idUser = (!empty($data['idUser'])) ? $data['idUser'] : null;
        $this->idLivre = (!empty($data['idLivre'])) ? $data['idLivre'] : null;
        $this->Note = (!empty($data['Note'])) ? $data['Note'] : null;
    }
    
    // Add the following method:
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
    
    // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'idUser',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'idLivre',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'Note',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));


             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }

}
