<?php
class CAdmin
{
    // Crear usuario desde admin.
    public function CrearUsuario($array)
    {
        if (array_key_exists('idUsuario', $array) and array_key_exists('usNombre', $array) and array_key_exists('usPass', $array) and array_key_exists('usMail', $array) and array_key_exists('usDeshabilidato', $array)) {
            $Usuario = new Usuario();
            $Usuario->setear($array['idUsuario'], $array['usNombre'], $array['usPass'], $array['usMail'], $array['usDeshabilidato']);
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
        if (array_key_exists('idUsuario', $array) and array_key_exists('idRol', $array)) {
            $nuevoRol = new UsuarioRol();
            $nuevoRol->setear($array['idUsuario'], $array['idRol']);
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
        if (array_key_exists('idUsuario', $array)) {
            $Usuario = new Usuario();
            $Usuario->setIdUsuario($array['idUsuario']);
            foreach ($array as $key => $data) {
                if ($key != 'idUsuario') {
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
        if (array_key_exists('idRol', $array)) {
            $rol = new Rol();
            $rol->setear($array['idRol'], $array['rolDescripcion']);

            if (!$rol->Load()) {
                $rol = null;
            }
        }
        // Check if it works.
        // Return type
        return $rol;
    }
}
