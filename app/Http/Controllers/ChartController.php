<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChartController extends Controller
{
    public function getDataChart(){

            $arrayResult=[];
    	for($i=0;$i<10;$i++){
    		$arrayResult[$i]['name']='User'.$i;
    		$arrayResult[$i]['y']=$i*6;
    	}
    	


    $arrayResultLine=[];
    $arrayResultLine[0]['name']='Guayaquil';
    	for($i=0;$i<13;$i++){
    		
    		$arrayResultLine[0]['data'][]=$i*2;
    	}



    	return  response()->json(["data"=>$arrayResult,"success"=>200,'line'=>$arrayResultLine]);
    }
}
