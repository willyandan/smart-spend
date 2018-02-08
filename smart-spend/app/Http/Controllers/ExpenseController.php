<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expense;

class ExpenseController extends Controller
{

	public function get()
	{
		return json_encode(expense::latest('updated_at')->get());
	}

    public function create(Request $request)
    {
    	try {
    		$disp = new expense;
    		$disp->name = $request->name;
    		$disp->value = $request->value;
    		$disp->save();
    		return json_encode(['message' => 'success']);
    	} catch (Exception $e) {
    		return json_encode(['message' => 'error']);
    	}
    }
}
