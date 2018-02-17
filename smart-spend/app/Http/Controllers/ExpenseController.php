<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expense;

class ExpenseController extends Controller
{

    public function index()
    {
        return view('dispesas');
    }

	public function get()
	{
		return json_encode(expense::latest()->get());
	}

    public function create(Request $request)
    {
    	try {
    		$disp = new expense;
    		$disp->name = $request->name;
    		$disp->value = $request->value;
    		$disp->save();
    		return json_encode(['message' => 'success']);
    	} catch (\Exception $e) {
    		return json_encode(['message' => 'error']);
    	}
    }

    public function update($id, Request $request)
    {
        try {
            $disp = expense::findOrFail($id);
            $disp->name = $request->name;
            $disp->value = $request->value;
            $disp->save();
            return json_encode(['message'=>'success']);   
        } catch (\Exception $e) {
            return $e->getError();
        }
    }

    public function delete($id)
    {
        expense::destroy($id);
        return json_encode(['message' => 'success']);
    }
}
