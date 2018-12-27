<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use App\Car;

class IndexController extends Controller
{
    
    protected $result_crawler;
    protected $filter;
    
    
    public function index() {
        
        $cars = Car::all();
        //$teste = $this->processaCrawler();
        //dd($teste);
        return view('index', ['cars'=>$cars]);
    }
    
    public function processa_crawler(){
        $crawler = "https://www.seminovosbh.com.br/resultadobusca/index/veiculo/carro/marca/BMW/modelo/1239/usuario/todos";

        //Extrai os dados da página e retira deles a lista de carros resultante
        $this->result_crawler = file_get_contents($crawler);
        $this->filter = explode('<dd class="titulo-busca">', $this->result_crawler);
        unset($this->filter[0]);

        //Pega a quantidade total de páginas da consulta
        $aux1 = explode('<strong class="total">', $this->result_crawler);
        $aux2 = explode('</strong>', $aux1[1]);
        $totalPaginas = $aux2[0];

        
        /*$compilado[0] = array("totalpaginas" => $totalPaginas);
        $i = 1;*/
        $this->save_crawler();
        
        
        //dd($compilado);
        return redirect()->route('index')->with('mensagem', 'Executado com sucesso!');;
    }
    
    public function save_crawler(){
        //Cria o array que será utilizado como retorno
        $compilado = array();
        
        //Para cada resultado, separa-se o título e o código do anúncio
        //Marca, modelo, ano fabricação, ano modelo, preço, url do veículo, id do veículo
        foreach($this->filter as $this->result_crawler){
            $resto = explode('</dd>', $this->result_crawler);
            $linha = $resto[0];
            
            $arrayCodigo = explode('/', $linha);
            $codigo = $arrayCodigo[1]."/".$arrayCodigo[2]."/".$arrayCodigo[3]."/".$arrayCodigo[4]."/".$arrayCodigo[5]."/";

            $aux1 = explode('<h4>', $linha);
            $aux2 = explode('</h4>', $aux1[1]);
            $titulo = strip_tags($aux2[0]);
            $aux3 = explode('<span',$aux2[0]);
            $modfrab = explode('-', $arrayCodigo[4]);
            //dd($arrayCodigo[5]);
            $compilado[] = array("codigo"=> $codigo, "titulo" => $titulo);
            
            
            $car_register = new Car;
            $car_register->id = $arrayCodigo[5];
            $car_register->marca = strtoupper($arrayCodigo[2]);
            $car_register->modelo = $aux3[0];
            $car_register->fabricacao = $modfrab[0];
            $car_register->anomod = $modfrab[1];
            $car_register->preco = "R$ ".trim(substr(strip_tags($aux3[1]),24));
            $car_register->link = "https://www.seminovosbh.com.br/$codigo";
            $car_register->save();
        }
        
        //return $compilado
    }
}
