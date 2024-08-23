<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegProducto"||
   $ruta["query"]=="ctrEditProducto"||
   $ruta["query"]=="ctrEliProducto"){
    $metodo=$ruta["query"];
    $producto=new ControladorProducto();
    $producto->$metodo();
}

}




class ControladorProducto{
     

    static public function ctrInfoProductos(){
        $respuesta=ModeloProducto::mdlInfoProductos();
        return $respuesta;
    }


    static public function ctrRegProducto(){
        require "../modelo/productoModelo.php";

        $data=array(
            "codProducto"=>$_POST["codp"],
            "codProductoSin"=>$_POST["codps"],
            "nombreProducto"=>$_POST["nombre"],
            "precioProducto"=>$_POST["precio"],
            "unidadMedida"=>$_POST["unidadm"],
            "unidadMedidaSin"=>$_POST["unidadms"],
            "imagenProducto"=>$_POST["imagen"],
            "disponible"=>$_POST["disponible"]
        );
        $respuesta=ModeloProducto::mdlRegProducto($data);

        echo $respuesta;

    }

    static public function ctrInfoProducto($id){

        $respuesta=ModeloProducto::mdlInfoProducto($id);
        return $respuesta;
    }


static function ctrEditProducto(){
    require "../modelo/productoModelo.php";



    $data=array(
            "id"=>$_POST["idProducto"],
            "codProducto"=>$_POST["codp"],
            "codProductoSin"=>$_POST["codps"],
            "nombreProducto"=>$_POST["nombre"],
            "precioProducto"=>$_POST["precio"],
            "unidadMedida"=>$_POST["unidadm"],
            "unidadMedidaSin"=>$_POST["unidadms"],
            "imagenProducto"=>$_POST["imagen"],
            "disponible"=>$_POST["disponible"]
    );

    ModeloProducto::mdlEditProducto($data);
    $respuesta=ModeloProducto::mdlEditProducto($data);
    echo $respuesta; 
}

static function ctrEliProducto(){
    require "../modelo/productoModelo.php";
    $id=$_POST["id"];
    $respuesta= ModeloProducto::mdlEliProducto($id);
    echo $respuesta;
}

}//final