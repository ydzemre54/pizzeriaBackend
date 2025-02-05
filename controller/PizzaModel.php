<?php

class PizzaModel {
    public function create() {
        try {
            $db = Database::getInstance();
            $stmt = $db->prepare('');
            $stmt->execute([              
                
            ]);
            return $stmt->fetch();
        } catch (PDOException $exc) {
            exit($exc->getMessage());
        }      
    }
}