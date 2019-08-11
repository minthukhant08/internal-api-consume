<?php

namespace App\Http\ApiControllers;

use App\Http\ApiControllers\APIBaseController as BaseController;
use Illuminate\Http\Request;

class MailController extends BaseController
{

    public function convertUserType($value, $default)
    {
        if (strcasecmp($value, 'student') == 0) {
            return 1;
        }elseif (strcasecmp($value, 'teacher') == 0) {
            return 2;
        }else {
            return $default;
        };
    }

    public function convertGender($value, $default)
    {
        if (strcasecmp($value, 'male') == 0) {
            return 1;
        }elseif (strcasecmp($value, 'female') == 0) {
            return 2;
        }else {
            return $default;
        };
    }

    public function index(Request $request)
    {
        $this->offset = isset($request->offset)? $request->offset : 0;
        $this->limit  = isset($request->limit)? $request->limit : 30;
        $name         = isset($request->name)? $request->name : '%';
        $course       = isset($request->course)? $request->course : '%';
        $batch        = isset($request->batch)? $request->batch : '%';
        $gender       = isset($request->gender)? $request->gender : '%';
        $user_type    = isset($request->user_type)? $request->user_type : '%';

        $user_type = $this->convertUserType($user_type, '%');
        $gender    = $this->convertGender($gender, '%');

        $users = UserResource::collection($this->userInterface->getAll($this->offset, $this->limit, $user_type, $name, $course, $batch, $gender));
        $total = $this->userInterface->total();
        $this->data($users);
        $this->total($total);
        return $this->response('200');
    }

    public function login(Request $request)
    {

        // dd($request->only('email', 'password'));
        $email = $request->email;
        $password = $request->password;
        $user = $this->userInterface->findByEmail($request->email);
        if (empty($user)) {
            $this->setError('401');
            return $this->response('401');
        }else{
            // $credentials = $request->only('email', 'password');
            $credentials = array('email'=>$email, 'password'=>$password);
            if (!$token = JWTAuth::attempt($credentials)) {
                $this->setError('401');
                return $this->response('401');
            }else{
              $user = new UserResource($user);
              $this->data(array('user' => $user, 'token' => $token));
              return $this->response('201');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
              'name'      =>  'required',
              'email'     =>  'required|email|unique:user,email',
              'password'  =>  'required',
              'gender'    =>  'required',
              'date_of_birth'=> 'required|date',
              'phone_no'  =>  'required',
              'nrc_no'    =>  'required',
              'address'   =>  'required',
              'user_type' =>  'required',
              'image'     =>  'required|image'
          ]);

         if ($validator->fails()) {
             $this->setError('400');
             $messages=[];

             foreach ($validator->messages()->toArray() as $key=>$value) {
                  $messages[] = (object)['attribue' => $key, 'message' => $value[0]];
             }

             $this->setValidationError(['validation' => $messages]);
             return $this->response('400');
         }

         $user = $request->all();
         $user['password'] = Hash::make($user['password']);
         $user['user_type'] = $this->convertUserType($user['user_type'], 1);
         $user['gender'] = $this->convertGender( $user['gender'], 1);
         $path = $request->file('image')->getRealPath();
         $img = base64_encode(file_get_contents($path));
         $user['image'] = $img;
         $result = $this->userInterface->store($user);
         $token = JWTAuth::fromUser($result);

         if (isset($result)) {
            $this->data(array('id' =>  $result->id, 'token' => $token));
            return $this->response('201');
         }else{
            return $this->response('500');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userInterface->find($id);
        if (empty($user)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $user = new UserResource($user);
            $this->data(array($user));
            return $this->response('201');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
              'email'     =>  'email|unique:user,email',
              'date_of_birth'=> 'date',
              'image'     =>  'image'
          ]);

         if ($validator->fails()) {
             $this->setError('400');
             $messages=[];

             foreach ($validator->messages()->toArray() as $key=>$value) {
                  $messages[] = (object)['attribue' => $key, 'message' => $value[0]];
             }

             $this->setValidationError(['validation' => $messages]);
             return $this->response('400');
         }

        $user = $this->userInterface->find($id);
        if (empty($user)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $user = $request->all();
            $user['user_type'] = $this->convertUserType($user['user_type'], 1);
            $user['gender'] = $this->convertGender( $user['gender'], 1);
            if ($this->userInterface->update($user,$id)) {
                $this->data(array('updated' =>  1));
                return $this->response('200');
            }else{
                return $this->response('500');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userInterface->find($id);
        if (empty($user)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $this->userInterface->destroy($id);
            $this->data(array('deleted' =>  1));
            return $this->response('200');
        }
    }

    public function image($id)
    {
        $img = $this->userInterface->find($id)->image;
        return response(base64_decode($img), 200, ['Content-Type' => 'image/png',]);
    }
}
