<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tags;

use App\Http\Requests\TagsRequest;
use DB;
class TagsController extends Controller
{
    public function Index(){
        $tags = Tags::latest()->get();
        return response()->json($tags);
    }
    public function Create(TagsRequest $request)
    {
        try{
            $tag = Tags::create([
                'tag_name' => $request->tag_name,
            ]);
            return response([
                'message' => 'Tag Inserted Successfully',
                'tag' => $tag
            ],200);
        }catch(Exception $exception){
            return response([
                'message' => $exception->getMessage()
            ],400);
        }
    }
    public function View($id)
    {
        if(Tags::where('id',$id)->doesntExist())
        {
            return response([
                'message' => 'Tag Not Found'
            ],401);
        }

        $tag = Tags::findOrFail($id);
        return response([
            'tag' => $tag
        ],200);

    }
    public function Update(TagsRequest $request,$id){
        if(Tags::where('id',$id)->doesntExist())
        {
            return response([
                'message' => 'Tag Not Found'
            ],401);
        }
        Tags::whereId($id)->update(['tag_name' => $request->tag_name]);

        return response([
            'message' => 'Tag Updated'
        ],200);
    }

    public function Delete($id){
        if(Tags::where('id',$id)->doesntExist())
        {
            return response([
                'message' => 'Tag Not Found'
            ],401);
        }
        Tags::whereId($id)->delete();

        return response([
            'message' => 'Tag Deleted'
        ],200);
    }
}
