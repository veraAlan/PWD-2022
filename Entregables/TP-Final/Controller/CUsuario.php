<?php
class CUsuario
{
    public function LoadObject($data)
    {
        $object = new Usuario();
        if (array_key_exists('idusuario', $data)) {
            $object->setIdUsuario($data['idusuario']);
            $object->Load();
            foreach ($data as $key => $value) {
                if ($value != "null") {
                    switch ($key) {
                        case 'usnombre':
                            $object->setUsNombre($value);
                            break;
                        case 'uspass':
                            $object->setUsPass($value);
                            break;
                        case 'usmail':
                            $object->setUsMail($value);
                            break;
                        case 'usdeshabilitado':
                            $object->setUsDeshabilitado($value);
                            break;
                    }
                }
            }
        }
        return $object;
    }

    /**
     * Carga objeto desde arreglo = ["idusuario" => value]
     */
    public function LoadObjectEnKey($data)
    {
        $object = new Usuario();
        if (isset($data['idusuario'])) {
            $object->setIdUsuario($data['idusuario']);
            $object->Load();
        }
        return $object;
    }

    // FIXME Agregar documentacion que le de sentido a la funcion.
    /**
     * ?????????????????????????
     * Checks idusuario for... Key set???????????????????
     * Tiene que hacer esto????:
     * return isset($data['idusuario']);
     * ?????????????????
     */
    public function SetearEnKey($data)
    {
        $resp = false;
        if (isset($data['idusuario'])) {
            $resp = true;
        }
        return $resp;
    }

    // TODO Registrar usuario
    public function Register($data)
    {
        $resp = false;
        $object = new Usuario();
        if (isset($data['idusuario'])) {
            $object->setIdUsuario($data['idusuario']);
        }

        $object->setUsNombre($data['usnombre']);
        $object->setUsPass($data['uspass']);
        $object->setUsMail($data['usmail']);
        if ($object->Insert()) {
            $data['idusuario'] = $object->getIdUsuario();
            if ($this->RegisterRole($data, $object)) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * Agrega el UsuarioRol elegido en el registro.
     */
    public function RegisterRole($data, $objUsuario)
    {
        $usRol = new UsuarioRol();
        $rol = new Rol();
        $rol->setIdRol($data['idrol']);
        $rol->Load();
        $usRol->setear($objUsuario, $rol);
        $resp = $usRol->Insert($data);
        return $resp;
    }

    public function Drop($data)
    {
        $resp = false;
        if ($this->SetearEnKey($data)) {
            $object = $this->LoadObjectEnKey($data);
            if ($object->getIdUsuario() != null && $object->Delete()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function Modify($data)
    {
        $resp = false;
        if ($this->SetearEnKey($data)) {
            $object = $this->LoadObject($data);
            if ($object->Modify()) {
                $resp = true;
            }
        }

        if (isset($data['idrol'])) {
            $usRol = new CUsuarioRol();
            $resp = $resp || $usRol->Modify($data);
        }
        return $resp;
    }

    public function List($data = "")
    {
        $where = "true";
        if ($data <> NULL) {
            if (isset($data['idusuario']))
                $where .= " and idusuario=" . $data['idusuario'];
            if (isset($data['usnombre']))
                $where .= " and usnombre='" . $data['usnombre'] . "'";
            if (isset($data['uspass']))
                $where .= " and uspass='" . $data['uspass'] . "'";
            if (isset($data['usEmail']))
                $where .= " and usEmail='" . $data['$usEmail'] . "'";
        }
        $object = new Usuario();
        $array = $object->List($where);
        return $array;
    }
}
