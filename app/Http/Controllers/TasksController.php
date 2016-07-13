<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Tasks;
use Auth;
use Illuminate\Http\Response;

class TasksController extends Controller
{
	/**
	 * Listing tasks :)
	 *
	 * @param $id
	 * @param $taskid
	 *
	 * @return Response
	 */
	public function index( $id = null, $taskid = null ) {

		$tasks;

		if(!empty($id)){

			if(empty($taskid)){

				$tasks = Tasks::where('list_id', $id)->get();

			} else {

				$tasks = Tasks::where('list_id', $id)->where('id',$taskid)->get();
			}
		}

		if( $tasks->count() > 0 ){

			return $tasks;

		} else {

			$response = new Response();
			$response->setStatusCode(403, 'The resource does not belong to the authenticated user and is forbidden.');
			return $response;
		}
	}

	/**
	 * Creating a task
	 *
	 * @param  Request  $request
	 * @param $id
	 *
	 * @return Response
	 */
	public function create(Request $request, $id) {
		
		$task = new Tasks();
		$task->list_id = $id;
		$task->description = $request->get('description');
		$task->completed = $request->get('completed');
		$task->save();
		
		$response = new Response();
		$response->setStatusCode(201, 'The resource was successfully created.');

		return $response;
	}

	/**
	 * Updating a task
	 *
	 * @param  Request  $request
	 * @param $id
	 * @param $taskid
	 *
	 * @return Response
	 */
	public function update(Request $request, $id, $taskid) {

		$task = Tasks::where('list_id', $id)
					 ->where('id',$taskid);

		$response = new Response();

		if( $task->count() > 0 ){
			
			$task->update([
		 		'description' => $request->get('description'),
		 		'completed' => $request->get('completed'),
		 	]);

			$response->setStatusCode(201, 'The resource was successfully updated.');

		} else {

			$response->setStatusCode(403, 'The resource does not belong to the authenticated user and is forbidden.');
		}

		return $response;
	}

	/**
	 * Deleting a task
	 *
	 * @param $id
	 *
	 * @return Response
	 */
	public function delete( $id, $taskid ) {

		$task = Tasks::where('list_id', $id)
					 ->where('id',$taskid);

		$response = new Response();

		if( $task->count() > 0 ){

			$task->delete();

			$response->setStatusCode(204, 'The request was successful, but we did not send any content back.');
		
		} else {

			$response->setStatusCode(403, 'The resource does not belong to the authenticated user and is forbidden.');
		}
	
		return $response;
	}
}
