<?php

namespace App\Http\ApiControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\APIBaseController as BaseController;
use App\Repositories\CourseDetail\CourseDetailRepositoryInterface as CourseDetailInterface;
use App\Http\Resources\CourseDetail as CourseDetailResource;
use Validator;

class CourseDetailController extends BaseController
{
    public $courseDetailInterface;

    public function __construct(Request $request, CourseDetailInterface $courseDetailInterface)
    {
        $this->courseDetailInterface = $courseDetailInterface;
        $this->method           = $request->getMethod();
        $this->endpoint         = $request->path();
        $this->startTime        = microtime(true);
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
                        'course_id'   =>  'required|exists:course,id',
                        'topic'       =>  'required',
                        'descriptions'=>  'required'
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

         $courseDetail = $request->all();
         $result = $this->courseDetailInterface->store($courseDetail);

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
                        'course_id'  =>  'exists:course,id'
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
        $courseDetail = $this->courseDetailInterface->find($id);
        if (empty($courseDetail)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            if ($this->courseDetailInterface->update($request->all(),$id)) {
                $this->data(array('updated' =>  1));
                return $this->response('200');
            }else {
                return $this->response('500');
            };
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
        $courseDetail = $this->courseDetailInterface->find($id);
        if (empty($courseDetail)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
          $this->courseDetailInterface->destroy($id);
          $this->data(array('deleted' =>  1));
          return $this->response('200');
        }
    }
}
