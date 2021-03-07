<?php
namespace srv;
/**
 * aqui serao recebidas as requisicoes e instanciara os servicos adequados
**/

$path       = explode("/", $_GET['path']);
$json       = json_decode($contents, true);
$metod      = $_SERVER['REQUEST_METHOD'];

header('Content-type: application/json');
$body       = file_get_contents('php://input'); 

switch($path[0])
{
    case 'user':
        if($metod === 'GET')
        {
            autentica();
        }
        else
        {
            return msgErro();
        }
        break;
        
    case 'device':
        if($metod === 'GET')
        {
            return monitoraDispositivo();
        }
        else if($metod == 'POST')
        {
            return addDispositivo();
        }
        else
        {
            return msgErro();
        }
        break;
        

    default:
        return msgErro();
        break;
}

// autenticacao [GET]                           user/{user: x,senha: y}
function autentica()
{
    echo "Criar função de autenticação";
}
// monitoramento de estado (on / off) [GET]     device/{id:x}
function monitoraDispositivo()
{
    echo "Criar função de monitoramento";
}
// add lâmpada [POST]                           device/{token:w, description:x, place:y}
function addDispositivo()
{
    echo "Criar função de adição de dispositivo";
}
// LOGs [GET]                                   -- entre servicos -- 
// servico de ociosidade                        -- entre servicos -- 

function msgErro()
{
    return "Erro. Contate suporte!";
}