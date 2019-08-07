<?php

namespace App\Http\ApiControllers;

use Illuminate\Http\Request;
use App\Http\ApiControllers\APIBaseController as BaseController;
use App\Repositories\Activity\ActivityRepositoryInterface as ActivityInterface;
use App\Http\Resources\Activity as ActivityResource;
use Validator;

class ActivityController extends BaseController
{

    public $activityInterface;

    public function __construct(Request $request, ActivityInterface $activityInterface)
    {
        $this->activityInterface = $activityInterface;
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
         $name         = isset($request->name)? $request->name : '%';
         $speaker      = isset($request->speaker)? $request->speaker : '%';

         $activity = ActivityResource::collection($this->activityInterface->getAll($this->offset, $this->limit, $name, $speaker));
         $total = $this->activityInterface->total();
         $this->data($activity);
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
              'date'          =>  'required|date',
              'remarks'       =>  'required',
              'descriptions'  =>  'required',
              'speaker_name'  =>  'required',
              'image'         =>  'required|image'
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

       $activity = $request->all();
       $path = $request->file('image')->getRealPath();
       $img = base64_encode(file_get_contents($path));
       $activity['image'] = $img;
       $result = $this->activityInterface->store($activity);

       if (isset($result)) {
          $this->data(array('id' =>  $result));
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
        $activity = $this->activityInterface->find($id);
        if (empty($activity)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $activity = new ActivityResource($activity);
            $this->data(array($activity));
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
              'date'          =>  'date',
              'image'         =>  'image'
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

        $activity = $this->activityInterface->find($id);
        if (empty($activity)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            if ($this->activityInterface->update($request->all(),$id)) {
                $this->data(array('updated' =>  1));
                return $this->response('200');
            }else{
                return $this->response('200');
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
        $activity = $this->activityInterface->find($id);
        if (empty($activity)) {
            $this->setError('404', $id);
            return $this->response('404');
        }else{
            $this->activityInterface->destroy($id);
            $this->data(array('deleted' =>  1));
            return $this->response('200');
        }
    }

    /**
     * show image of the Activity resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function image($id)
    {
        $img = $this->activityInterface->find($id)->image;
        return response(base64_decode($img), 200, ['Content-Type' => 'image/png',]);
    }
}
