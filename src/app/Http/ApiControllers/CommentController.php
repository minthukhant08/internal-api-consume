<?php

namespace App\Http\ApiControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\APIBaseController as BaseController;
use App\Repositories\Comment\CommentRepositoryInterface as CommentInterface;
use App\Http\Resources\Comment as CommentResource;
use Validator;

class CommentController extends BaseController
{
    public $commentInterface;

    public function __construct(Request $request, CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
        $this->method           = $request->getMethod();
        $this->endpoint         = $request->path();
        $this->startTime        = microtime(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {
         $this->offset = isset($request->offset)? $request->offset : 0;
         $this->limit  = isset($request->limit)? $request->limit : 30;

         $comment = CommentResource::collection($this->commentInterface->getAll($this->offset, $this->limit, $request->activity_id));
         $total = $this->commentInterface->total();
         $this->data($comment);
         $this->total($total);
         return $this->response('200');
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
                        'descriptions'  =>  'required',
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

         $comment = $request->all();
         $result = $this->commentInterface->store($comment);

         if (isset($result)) {
           $this->data(array('id' =>  $result));
         }

         return $this->response('201');
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
                        'user_id'       =>  'exists:user,id',
                        'activity_id'   =>  'exists:activities,id'
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

        $comment = $this->commentInterface->find($id);
        if (empty($comment)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
          if ($this->commentInterface->update($request->all(),$id)) {
              $this->data(array('updated' =>  1));
              return $this->response('200');
          }else {
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
        $comment = $this->commentInterface->find($id);
        if (empty($comment)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
          $this->commentInterface->destroy($id);
          $this->data(array('deleted' =>  1));
          return $this->response('200');
        }
    }
}
