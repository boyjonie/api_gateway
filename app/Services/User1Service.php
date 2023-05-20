<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;
class User1Service{
use ConsumesExternalService;
/**
* The base uri to consume the User1 Service
* @var string
*/
public $baseUri;
public function __construct()
{
$this->baseUri =
config('services.users1.base_uri');
}
/**
* Obtain the full list of Users from User1 Site
* @return string
*/
public function obtainUsers1()
{
return $this->performRequest('GET','/users'); //is code will call the GET localhost:8000/users (our site1)
}

/**
* Create one user using the User1 service
* @return string
*/
public function createUser1($data)
{
    return $this->performRequest('POST', '/adduser',$data);
}
/**
* Update an instance of user1 using the User1 service
* @return string
*/
public function editUser1($data, $id)
{
return $this->performRequest('PUT', "/filluser/{$id}", $data);
}
/**
* Remove an existing user
* @return Illuminate\Http\Response
*/
public function delete($id)
{
return $this->performRequest('DELETE', "/dropuser/{$id}");
}
}