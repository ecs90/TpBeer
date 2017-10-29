<?php

namespace DAOs;

interface IDAO
{
    public function agregar($modelo);
    //public function getAll();
    public function eliminar($modelo);
    public function buscar($modelo);
}
