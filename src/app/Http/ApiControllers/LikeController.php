<?php

namespace App\Http\ApiControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\APIBaseController as BaseController;
use App\Repositories\Like\LikeRepositoryInterface as LikeInterface;
use App\Http\Resources\Like as LikeResource;
use Validator;

class LikeController extends BaseController
{
    public $likeInterface;

    public function __construct(Request $request, LikeInterface $likeInterface)
    {
        $this->likeInterface    = $likeInterface;
        $this->method            = $request->getMethod();
        $this->endpoint          = $request->path();
        $this->startTime         = microtime(true);
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
                'user_id'       =>  'required|exists:user,id',
                'activity_id'   =>  'required|exists:activities,id'
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

         $like = $request->all();
         $result = $this->likeInterface->store($like);

         if (isset($result)) {
            $this->data(array('id' =>  $result));
         }

         return $this->response('201');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $like = $this->likeInterface->find($id);
      if (empty($like)) {
          $this->setError('404', $id);
          return $this->response('404');
      }else{
          $this->likeInterface->destroy($id);
          $this->data(array('deleted' =>  1));
          return $this->response('200');
      }
    }
}
