<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class InvokerController extends Controller
{
	function Index(){
		$client = new Client(); //GuzzleHttp\Client
		$response = $client->request('GET', 'www.mocky.io/v2/5c7db5e13100005a00375fda');
		$json = json_decode($response->getBody(), true);
		return response()->json([
			'data' => str_replace(' ', '_', $json['result'])
		], 200, [], JSON_UNESCAPED_UNICODE);
	}
}
