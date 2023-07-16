<?php

namespace App\Controllers;
// use App\Models

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    } 
    

    public function prueba ()
    {
        echo 'Api de local de comida';
    }

    public function api ()
    {


        $propietario= array (
            "local"=>"Santburger",
            "propietario"=>"Nixon Alcivar",
            "Ciudad"=>"Portoviejo",
            "Direccion"=>"Av Manabi y Granda Centeno",
            "telefono"=>"+593980654321"
        );

        $menu= array (
            "hamburgesa"=>"simple = $1.5, doble = $2.5, triple = $3.5, americana = $3, hawaiana = $3",
            "alitas"=>"6 = $5, 12 = $10, 24 = $20, 30= $27",
            "batidos"=>"oreo = $1.5, fresa = $1.5, guineo = $1.5, aguacate = $1.5, nispero = $1.5, mango = $1.5",
            "pizza"=>"personal = $5, familiar = $15",
        );


        $cliente1= array (
            "cliente"=>"Juan Palma",
            "fecha"=>"21/6/2023",
            "Pedido"=>"hamburgesa: 2 simples, batidos: 1 oreo",
            "total"=>"$4.50",
            "forma de pago"=>"Efectivo"
        );

        $cliente2= array (
            "cliente"=>"Carlos Posligua ",
            "fecha"=>"25/6/2023",
            "Pedido"=>"hamburgesa: 5 simples, batidos: 2 oreo, batidos: 3 fresa, alitas: 12",
            "total"=>"$25",
            "forma de pago"=>"Transferencia"
        );

        $cliente3= array (
            "cliente"=>"Maria Vera",
            "fecha"=>"24/6/2023",
            "Pedido"=>"hamburgesa: 3 simples, batidos: 1 guineo, batidos: 1 aguacate, batidos: 1 mango",
            "total"=>"$9",
            "forma de pago"=>"efectivo"
        );

        $cliente4= array (
            "cliente"=>"Gabriela Chilan",
            "fecha"=>"29/6/2023",
            "Pedido"=>"hamburgesa: 7 simples, batidos: 7 oreo, pizza: 1 familiar",
            "total"=>"$36",
            "forma de pago"=>"efectivo"
        );
$resultados = array($propietario, $menu, $cliente1, $cliente2, $cliente3, $cliente4);

        return $this->response->setJSON($resultados);

    }


    public function login(){

return view('login');
    
    } 


    public function testbd()
    {

        $this->db=\Config\Database::connect();
        $query=$this->db->query("SELECT * FROM clientes;");
        $result=$query->getResult();
        return $this->response->setJSON($result);


        // echo "hola";
    
    }
}
