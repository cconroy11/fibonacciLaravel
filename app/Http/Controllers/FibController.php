<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;

class FibController extends Controller
{
	/**
     * Get results
     *
     * @param Requests\Fib $request http request
     * @return Response $response http response
     */
    public function show(Requests\Fib $request) {
		// Get validated request inputs.
        $validated = $request->validated();

        // Use validated inputs.
        $userNum = $validated['number'];

		$result = $this->fib(intval($userNum));
    	return response()->json($result, 200);
    }

    public function fib($number) {

		if($number < 1) {
			return "Please input a number above 1.";
		}
		
	    $fib = 1;
	    $next = 0;
	    $prev = 0;
		$nice_string = '';

		$i = 1;
	    while ($i <= $number) {
	        $nice_string = $nice_string . $fib . ', ';
	        $next = $fib + $prev;
	        $prev = $fib;
	        $fib = $next;
			$i++;
	    }

	    return trim($nice_string, ', ');
    }
}