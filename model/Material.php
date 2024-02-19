<?php
    class Material{
        private $id_material;
        private $material;

        function getId_material(){
            return $this->id_material;
        }

        function getMaterial(){
            return $this->material;
        }

        function setId_material($id_material){ 
            $this->id_material = $id_material;
        }

        function setMaterial($material){ 
            $this->material = $material;
        }
    }
?>