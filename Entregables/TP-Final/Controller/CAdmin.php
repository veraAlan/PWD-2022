<?php
class CAdmin
{
    // Crear usuario desde admin.
    public function CrearUsuario($array)
    {
        if (array_key_exists('idusuario', $array) and array_key_exists('usnombre', $array) and array_key_exists('uspass', $array) and array_key_exists('usmail', $array) and array_key_exists('usdesabilitado', $array)) {
            $Usuario = new Usuario();
            $Usuario->setear($array['idusuario'], $array['usnombre'], $array['uspass'], $array['usmail'], $array['usdesabilitado']);
            if (!$Usuario->Load()) {
                $Usuario = null;
            }
        }
        // Return type
        return $Usuario;
    }

    // Asignar rol a un usuario especifico.
    public function AsignarRol($array)
    {
        if (array_key_exists('idusuario', $array) and array_key_exists('idrol', $array)) {
            $nuevoRol = new UsuarioRol();
            $nuevoRol->setear($array['idusuario'], $array['idrol']);
            if (!$nuevoRol->Load()) {
                $nuevoRol = null;
            }
        }
        // Return type
        return $nuevoRol;
    }

    // Actualiza informacion de un usuario.
    public function ActualizarUsuario($array)
    {
        if (array_key_exists('idusuario', $array)) {
            $Usuario = new Usuario();
            $Usuario->setIdUsuario($array['idusuario']);
            foreach ($array as $key => $data) {
                if ($key != 'idusuario') {
                    $string = 'set' . $key;
                    $Usuario->$string($data);
                }
            }
            if (!$Usuario->Load()) {
                $Usuario = null;
            }
        }
        // Return type
        return $Usuario;
    }

    // Gestiona los roles y menus.
    public function GestionarRol($array)
    {
        if (array_key_exists('idrol', $array)) {
            $rol = new Rol();
            $rol->setear($array['idrol'], $array['roldescripcion']);

            if (!$rol->Load()) {
                $rol = null;
            }
        }
        // Check if it works.
        // Return type
        return $rol;
    }
}
