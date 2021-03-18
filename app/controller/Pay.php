<?php
namespace app\controller;

use support\Request;

class Pay
{
    public function index(Request $request)
    {
        $json_str =  $request->rawBody();
        if(empty($json_str)){
            return json(['code' => 400, 'msg' => 'post_json is empty']);
        }
        $params_post = json_decode($json_str,true);
        if(empty($params_post)){
            return json(['code' => 400, 'msg' => 'post json decode error']);
        }
        $status = $this->paytype($params_post);
        if($status){
            return response('hello paycenter12321');
        }else{
            return response('hello 222');
        }

    }


    public function  paytype($postparam){
         $sid =  get_corporation_detail();
         var_dump($sid);
    }

    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }

    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

    public function file(Request $request)
    {
        $file = $request->file('upload');
        if ($file && $file->isValid()) {
            $file->move(public_path().'/files/myfile.'.$file->getUploadExtension());
            return json(['code' => 0, 'msg' => 'upload success']);
        }
        return json(['code' => 1, 'msg' => 'file not found']);
    }
    
}
