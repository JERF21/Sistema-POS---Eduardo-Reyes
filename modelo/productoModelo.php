<?php
require_once "conexion.php";
class ModeloProducto{

    static public function mdlAccesoProducto($producto){
        $stmt=Conexion::conectar()->prepare("select * from producto where login_producto='$producto'");
        $stmt->execute();

        return $stmt->fetch();

  /*       $stmt->close();
        $stmt->null;  */
    }


    
    static public function mdlInfoProductos(){
        $stmt=Conexion::conectar()->prepare("select * from producto");
        $stmt->execute();

        return $stmt->fetchAll();

  /*       $stmt->close();
        $stmt->null;  */
        
    }


    
    static public function mdlRegProducto($data){
        $codProducto=$data["codProducto"];
        $codProductoSin=$data["codProductoSin"];
        $nombreProducto=$data["nombreProducto"];
        $precioProducto=$data["precioProducto"];
        $unidadMedida=$data["unidadMedida"];
        $unidadMedidaSin=$data["unidadMedidaSin"];
        $imagenProducto=$data["imagenProducto"];
        $disponible=$data["disponible"];

        $stmt=Conexion::conectar()->prepare("insert into producto(cod_producto, cod_producto_sin, nombre_producto, precio_producto, unidad_medida, unidad_medida_sin, imagen_producto, disponible) 
        values('$codProducto', '$codProductoSin', '$nombreProducto', '$precioProducto', '$unidadMedida', '$unidadMedidaSin', '$imagenProducto', '$disponible')");

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

  /*       $stmt->close();
        $stmt->null();
 */

    }

    static public function mdlInfoProducto($id){
        $stmt=Conexion::conectar()->prepare("select * from producto where id_producto=$id");
        $stmt->execute();

        return $stmt->fetch();

  /*   $stmt->close();
        $stmt->null; */ 
    }

static public function mdlEditProducto($data){

    $codProducto=$data["codProducto"];
    $codProductoSin=$data["codProductoSin"];
    $nombreProducto=$data["nombreProducto"];
    $precioProducto=$data["precioProducto"];
    $unidadMedida=$data["unidadMedida"];
    $unidadMedidaSin=$data["unidadMedidaSin"];
    $imagenProducto=$data["imagenProducto"];
    $disponible=$data["disponible"];
    $id=$data["id"]; 

$stmt=Conexion::conectar()->prepare("update producto set cod_producto='$codProducto', cod_producto_sin='$codProductoSin', nombre_producto='$nombreProducto',
precio_producto='$precioProducto', unidad_medida='$unidadMedida', unidad_medida_sin='$unidadMedidaSin', imagen_producto='$imagenProducto', disponible='$disponible' 
where id_producto=$id");

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }
/* 
        $stmt->close();
        $stmt->null();
 */
}

static public function mdlEliProducto($id){

    $stmt=Conexion::conectar()->prepare("delete from producto where id_producto=$id");

    if($stmt->execute()){
        return "ok";
    }
    else{
        return "error";
    }
/* 
    $stmt->close();
    $stmt->null();
*/

}

}//final