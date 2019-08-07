<?php

namespace App\Http\ApiControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\APIBaseController as BaseController;
use App\Repositories\Batch\BatchRepositoryInterface as BatchInterface;
use App\Repositories\BatchCourse\BatchCourseRepositoryInterface as BatchCourseInterface;
use App\Http\Resources\Batch as BatchResource;
use App\BatchCourse;
use Validator;

class BatchController extends BaseController
{
    public $batchInterface;
    public $batchCourseInterface;

    public function __construct(Request $request, BatchInterface $batchInterface, BatchCourseInterface $batchCourseInterface)
    {
        $this->batchInterface    = $batchInterface;
        $this->batchCourseInterface = $batchCourseInterface;
        $this->method            = $request->getMethod();
        $this->endpoint          = $request->path();
        $this->startTime         = microtime(true);
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

         $batch = BatchResource::collection($this->batchInterface->getAll($this->offset, $this->limit));
         $total = $this->batchInterface->total();
         $this->data($batch);
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
                'name'          =>  'required',
                'start_date'    =>  'required|date',
                'end_date'      =>  'required|date',
                'course_id'     =>  'required|exists:course,id',
                'course_id.*'   =>  'exists:course,id'
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

         $batch = $request->only('name', 'start_date', 'end_date');
         $result = $this->batchInterface->store($batch);
         dd($request->course_id);
         if (isset($result)) {
           $result->courses()->sync($request->course_id);
         }

         return $this->response('201');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batch = $this->batchInterface->find($id);
        if (empty($batch)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $batch = new BatchResource($batch);
            $this->data(array($batch));
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
                'start_date'    =>  'date',
                'end_date'      =>  'date',
                'course_id'     =>  'required|exists:course,id',
                'course_id.*'   =>  'exists:course,id'
            ]);

        if ($validator->fails()) {
            $this->setError('400');
            $messages=[];

            foreach ($validator->messages()->toArray() as $key=>$value) {
                  $messages[] = (object)['attribue' => $key, 'message' => $value[0]];
            };

            $this->setValidationError(['validation' => $messages]);
            return $this->response('400');
        }

        $batch = $this->batchInterface->find($id);
        if (empty($batch)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $result = $this->batchInterface->update($request->only('name', 'start_date', 'end_date'),$id);
            if (isset($result)) {
                if ($request->course_id != null) {
                    $result->courses()->sync($request->course_id);
                }
                $this->data(array('updated' =>  1));
                return $this->response('200');
            }else{
                return $this->response('500');
            };
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = $this->batchInterface->find($id);
        if (empty($batch)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $this->batchInterface->destroy($id);
            $this->data(array('deleted' =>  1));
            return $this->response('200');
        }
    }
}
