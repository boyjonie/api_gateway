<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
Class UserController extends Controller {
    use ApiResponser;
private $request;
public function __construct(Request $request){
$this->request = $request;
}
    public function g(){
        $users = User::all();
        //return response()->json($users, 200);
        return $this->successResponse($users);
    }
    public function show($id)
    {
        //
        return User::where('id','like','%'.$id.'%')->get();
        return $this->successResponse($user);
    }
    public function add(Request $request ){
        $rules = [
        'firstname' => 'required|max:20',
        'middlename' => 'required|max:20',
        'lastname' => 'required|max:20',
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $this->successResponse($users);
       
}
    public function fill(Request $request,$id)
    {
    $rules = [
        'firstname' => 'required|max:20',
        'middlename' => 'required|max:20',
        'lastname' => 'required|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    // if no changes happen
    if ($user->isClean()) {
    return $this->errorResponse('At least one value must
    change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
    return $this->successResponse($users);
}
    public function drop($id)
    {
    $user = User::findOrFail($id);
    $user->delete();
    return $this->successResponse($users);

 
    // old code
    /*
    $user = User::where('userid', $id)->first();
    if($user){
    $user->delete();
    return $this->successResponse($user);
    }
    {
    return $this->errorResponse('User ID Does Not Exists',
    Response::HTTP_NOT_FOUND);
    }
    */
    }
}
