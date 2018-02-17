<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Winning;

class WinningsController extends Controller
{
    public function index()
    {
    	return view('ganhos');
    }

    public function create(Request $request)
    {	
    	try {
    		$w = new Winning;
	    	$w->name = $request->name;
	    	$w->value = $request->value;
	    	$w->save();
	    	return json_encode(['message'=>'success']);	
    	} catch (\Exception $e) {
    		return json_encode($e->getMessage());
    	}
    	
    }
}
