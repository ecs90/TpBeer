<?php

namespace DAOs;

interface IDAO
{
    public function agregar($modelo);
    public function getLista();
    public function eliminar($id);
    public function buscar($id);
    public function modificar($id, $parametros);
}
