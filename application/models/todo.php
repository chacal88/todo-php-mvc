<?php

/**
 * @author kauesantos
 * Model todo responsavel por manipular banco
 */
class Todo extends Model {

    
    /**
     * Insere todo no banco de dados
     * @param unknown $todo
     */
    function insert($todo) {
    
        $this->query('insert into todo (description) values (\''.mysql_real_escape_string($todo).'\')');
    }
   
    /**
     * Delete todo do banco de dados
     * @param unknown $id
     */
    function delete($id) {
    
        $this->query('delete from todo where id = \''.mysql_real_escape_string( $id ).'\'');
    }
}
