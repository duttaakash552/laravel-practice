<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function test() {
		$data = array(
			'response' => 'Success'
		);

		return json_encode($data);
	}

}
