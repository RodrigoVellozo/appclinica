<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Nahid\JsonQ\Jsonq;
use App\Agendamento;


class RestController extends Controller{
    
    public function conf($cmd){
        $java = "http://clinic5.feegow.com.br/components/public/api/";
        $HOST = "api.feegow.com.br";
        $CTYPE = "application/json";
        $TOKEN = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38";

        $stringao = $java.$cmd."?x-access-token=".$TOKEN."&Content-Type=".$CTYPE."&Host=".$HOST;
        
        $client = new Client(); 
        
        $response = $client->get($stringao);
        
        return json_decode($response->getBody(), TRUE);
    }

    public function getIndex(){ 
        $comand ='specialties/list';

        $especs = $this->conf($comand);
        //dd($especs['content']);
		return view('welcome')->with('especs',$especs['content']);
    }

    public function ajax_getProfissionais(Request $request){
        $input= $request->all();
        $id = $input["id"];

        $comand ='professional/list';
        $prof = $this->conf($comand);

        $lista =[];

        foreach ($prof['content'] as $espec) 
        {
                                       

            if ( !(empty($espec["especialidades"]) || !isset($espec["especialidades"])) ) 
            {
                foreach ($espec["especialidades"] as $espec2)
                    {
                        if( isset( $espec2["especialidade_id"] ) )
                        {
                           
                            if($espec2["especialidade_id"] == $id)
                            {
                                array_push($lista, $espec);
                            }
                        }
                    }
            }
        }

        return response()->json($lista);

    }

    public function ajax_getProfissionais2(){
       
        $id = 158;//89;

        $comand ='professional/list';
        $prof = $this->conf($comand);
        $lista =[];

        foreach ($prof['content'] as $espec) 
        {
                                       

            if ( !(empty($espec["especialidades"]) || !isset($espec["especialidades"])) ) 
            {
                foreach ($espec["especialidades"] as $espec2)
                    {
                        if( isset( $espec2["especialidade_id"] ) )
                        {
                           
                            if($espec2["especialidade_id"] == $id)
                            {
                                array_push($lista, $espec);
                            }
                        }
                    }
            }
        }
       
    

        return response()->json($prof);


    }


    public function goAgendamento($id1, $id2){
        $comand ='patient/list-sources';

        $origem = $this->conf($comand)["content"];
        $data = ['id1'=>$id1,'id2'=>$id2];
        //dd($especs['content']);
		return view('agendamento',compact('origem','data'));

    }

    public function create(Request $request){
        $input= $request->all();
        $agendamento = new Agendamento();
        $agendamento->fill($input);
        $agendamento->save();
        

        return response()->json(["msg" => "cadastrado com sucesso", "status"=>"ok"]);

    }


}
