<?php
//use Slim\Psr7\Response;
class Logger
{
    public static function LogOperacion($request, $handler)
    {
        $requestType = $request->getMethod();
        $response=$handler->handle($request);
        $response->getBody()->write("hola people".$requestType);
        return $response;
    }
    public static function verificarCredenciales($request, $handler)
    {
        $requestType = $request->getMethod();
        //$response = New Response();
        $response=$handler->handle($request);
        if($requestType=='GET'){
            $response->getBody()->write("Método: ".$requestType. " no verificar");
        }else if($requestType=='POST'){
            $response->getBody()->write("Método: ".$requestType. " verificar");
            $dataParseada=$request->getParsedBody();
            $nombre=$dataParseada['nombre'];
            $perfil=$dataParseada['perfil'];
            if($perfil=='administrador'){
                $response->getBody()->write("Bienvenido! ".$nombre); 
            }else{
                $response->getBody()->write("Usuario ".$nombre);
            }
            $response=$handler->handle($request);
        }
        
        return $response;
    }
    public static function devolver($request, $handler)
    {
        $requestType = $request->getMethod();
        $response=$handler->handle($request);
        $response->getBody()->write("hola people".$requestType);
        return $response;
    }
}