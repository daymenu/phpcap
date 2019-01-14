<?php

namespace App\Http\Controllers\Api;

use App\Models\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Api $api)
    {
        $result 		= ["state"=> '', "url"=> '',"title"=> '',"original"=> '',"type"=> '',"size"=> 0];  
        $upFile			= $request->file('file');
		if($upFile->getError() == 0) {
			$result['state']	= 'SUCCESS';
        	$upName 			= $upFile->store('public');
        	$result['url']      = Storage::url($upFile->hashName());
		}else {
			$result['state']	= $upFile->getErrorMessage();
		}
        $result['title']     	= $upFile->hashName();
        $result['original']     = $upFile->getClientOriginalName();
        $result['type']     	= $upFile->getClientOriginalExtension();
        $result['size']     	= $upFile->getSize();
        return $this->apiSuccess($result);
    }
}