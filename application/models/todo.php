<?php

/**
 * @author kauesantos
 * Model todo responsavel por manipular banco
 */
class Todo extends Model {
    
    protected $id;
    
    /**
     * @var unknown
     */
    protected $description;
    
    /**
     * Insere todo no banco de dados
     * @param unknown $todo
     */
    function insert() {
    
        $this->query('insert into todo (description) values (\''.mysql_real_escape_string( $this->getDescription() ).'\')');
    }
   
    /**
     * Delete todo do banco de dados
     * @param unknown $id
     */
    function delete() {
    
        $this->query('delete from todo where id = \''.mysql_real_escape_string( $this->getId() ).'\'');
    }
 /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

 /**
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

 /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

 /**
     * @param unknown $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}
