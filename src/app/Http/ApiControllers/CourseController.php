<?php

namespace App\Http\ApiControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\APIBaseController as BaseController;
use App\Repositories\Course\CourseRepositoryInterface as CourseInterface;
use App\Http\Resources\Course as CourseResource;
use Validator;


class CourseController extends BaseController
{
    public $courseInterface;

    public function __construct(Request $request, CourseInterface $courseInterface)
    {
        $this->courseInterface = $courseInterface;
        $this->method          = $request->getMethod();
        $this->endpoint        = $request->path();
        $this->startTime       = microtime(true);
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
        $course  = CourseResource::collection($this->courseInterface->getAll($this->offset, $this->limit));
        $total = $this->courseInterface->total();
        $this->data($course);
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
                'name'      =>  'required',
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

         $course = $request->all();
         $path = $request->file('image')->getRealPath();
         $img = base64_encode(file_get_contents($path));
         $course['image'] = $img;
         $result = $this->courseInterface->store($course);

         if (isset($result)) {
             $this->data(array('id' =>  $result));
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
        $course = $this->courseInterface->find($id);
        if (empty($course)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
          $course = new CourseResource($course);
          $this->data(array($course));
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
                'image'     =>  'image'
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
        $course = $this->courseInterface->find($id);
        if (empty($course)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
          if ($this->courseInterface->update($request->all(),$id)) {
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
        $course = $this->courseInterface->find($id);
        if (empty($course)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
          $this->courseInterface->destroy($id);
          $this->data(array('deleted' =>  1));
          return $this->response('200');
        }
    }

    /**
     * show image of the Course resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function image($id)
    {
        $img = $this->courseInterface->find($id)->image;
        return response(base64_decode($img), 200, ['Content-Type' => 'image/png',]);
    }
}
