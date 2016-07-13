#TODO List REST API built with Laravel

Works with "Basic HTTP Authentication". All responses are in JSON format.

##Usage

```curl -u "username:passw0rd" http://todo-api.dev/v1/lists```

##HTTP Response codes

- 200: The request was successful.
- 201: The resource was successfully created.
- 204: The request was successful, but we did not send any content back.
- 400: The request failed due to an application error, such as a validation error.
- 401: An API key was either not sent or invalid.
- 403: The resource does not belong to the authenticated user and is forbidden.
- 404: The resource was not found.
- 500: A server error occurred.

##API Endpoints

###GET /v1/lists

Returns all lists of the authorized user

###POST /v1/lists

Creates a new list. Returns HTTP.201 if successful.

Parameters:

- [name]: Name of list
- [description]: Description of list

###GET /v1/lists/{id}

Returns the list with given ID.

###PUT /v1/lists/{id}

Updates the list with given ID.

Parameters:

- [name]: Name of list
- [description]: Description of list

###DELETE /v1/lists/{id}

Deletes the list with given ID and related tasks. Returns HTTP.204 if successful. 

###GET /v1/lists/{id}/tasks

Returns the tasks of the list with given ID.

###POST /v1/lists/{id}/tasks

Adds a new task to the list with given ID. Returns HTTP.201 if successful.

Parameters:

- [description]: Description of task
- [completed]: Task status. 1: completed, 0: not completed.

###GET /v1/lists/{id}/tasks/{taskid}

Returns the task with given ID.

###PUT /v1/lists/{id}/tasks/{taskid}

Updates the task with given ID.

Parameters:

- [description]: Description of task
- [completed]: Task status. 1: completed, 0: not completed.

###DELETE /v1/lists/{id}/tasks/{taskid}

Deletes the task with given ID. Returns HTTP.204 if successful.