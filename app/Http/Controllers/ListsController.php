<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lists;
use Auth;
use Illuminate\Http\Response;

class ListsController extends Controller
{
	/**
	 * Listing lists :)
	 *
	 * @param $id
	 *
	 * @return Response
	 */
	public function index( $id = null ) {

		$lists;

		if(empty($id)){

			$lists = Lists::where('user_id', Auth::user()->id)->get();

		} else {

			$lists = Lists::where('user_id', Auth::user()->id)->where('id',$id)->get();
		}

		if( $lists->count() > 0 ){

			return $lists;

		} else {

			$response = new Response();
			$response->setStatusCode(403, 'The resource does not belong to the authenticated user and is forbidden.');
			return $response;
		}
	}

	/**
	 * Creating a list
	 *
	 * @param  Request  $request
	 *
	 * @return Response
	 */
	public function create(Request $request) {
		
		$list = new Lists();
		$list->user_id = Auth::user()->id;
		$list->name = $request->get('name');
		$list->description = $request->get('description');
		$list->save();
		
		$response = new Response();
		$response->setStatusCode(201, 'The resource was successfully created.');

		return $response;
	}

	/**
	 * Updating a list
	 *
	 * @param  Request  $request
	 * @param $id
	 *
	 * @return Response
	 */
	public function update(Request $request, $id) {

		$list = Lists::where('user_id',Auth::user()->id)
					 ->where('id',$id);

		$response = new Response();

		if( $list->count() > 0 ){
			
			$list->update([
		 		'name' => $request->get('name'),
		 		'description' => $request->get('description'),
		 	]);

			$response->setStatusCode(201, 'The resource was successfully updated.');

		} else {

			$response->setStatusCode(403, 'The resource does not belong to the authenticated user and is forbidden.');
		}

		return $response;
	}

	/**
	 * Deleting a list
	 *
	 * @param $id
	 *
	 * @return Response
	 */
	public function delete($id) {

		$list = Lists::where('user_id',Auth::user()->id)
					 ->where('id',$id);

		$response = new Response();

		if( $list->count() > 0 ){

			$list->delete();

			$response->setStatusCode(204, 'The request was successful, but we did not send any content back.');
		
		} else {

			$response->setStatusCode(403, 'The resource does not belong to the authenticated user and is forbidden.');
		}
	
		return $response;
	}
}
