<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    private $MSG_ERR_ID_NOT_FOUND = 'ID did not match any of the data found in database.';
    private $MSG_ERR_ADDITIONAL_PROPS = 'Model does not contain properties found in request';
    private $MSG_SUC_ID_FOUND = 'Data found.';
    private $MSG_SUC_UPDATE = 'Data successfully updated.';

    public function index()
    {
        $news = News::where('is_deleted', 0)->get();
        return response()->json($news, 200, ['application/json']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        \Log::info(json_encode($request->all()));
        $request->validate([
        ]);
        $news = new News;
        $news->fill($request->except(['user_id']));
        $news->user_id = $request->user_id;

        if($request->hasFile('image')){
            $pathToFile = $request->file('image')
                ->store('News', 'vue');
            $news->image = $pathToFile;
        }
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->user_id = $request->input('user_id');
        $news->author = $request->input('author');
        $news->save();

        if($news->save()) {
            return response($news, 200, ['application/json']);
        } else {
            return response("Error in saving data", 400, ['application/json']);
        }
    }

    public function show($id)
    {
        $news = News::find($id);
        $msg = '';
        $status = '';
    
        if(isset($news)) {
            $msg = $this->MSG_SUC_ID_FOUND;
            $status = 200;
        } else {
            $msg = $this->MSG_ERR_ID_NOT_FOUND;
            $status = 404;
        }

        return response($this->generateRes($news, $status, $msg), 200, ['application/json']);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $msg = '';
        $status = '';

        if(!isset($news)) {
            $msg = $this->MSG_ERR_ID_NOT_FOUND;
            $status = 404;
        }

        if($news) {
            $validated = $request->validate([
                'user_id'   => 'required',
                'title'     => 'required',
                'content'   => 'required',
                'image'     => 'required',
                'author'    => 'required',
            ]);

            $news->fill($request->except(['user_id']));
            $news->user_id  = $request->user_id;
            $news->save();
        } else {
            $msg = $this->MSG_ERR_ADDITIONAL_PROPS;
            $status = 500;
            $news = null;
        }
        if($request->hasFile('image')){
            $pathToFile = $request->file('image')
                ->store('News', 'vue');
            $news->image = $pathToFile;
        }
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->user_id = $request->input('user_id');
        $news->author = $request->input('author');
        $news->save();
        
        return response($this->generateRes($news, $status, $msg), 200, ['application/json']);
    }

    public function destroy($id) 
    {
        $news = News::findOrFail($id);
        $news->is_deleted = true;
        $news->save();

        return response('News successfully deleted', 200, ['application/json']);
    }

    public function generateRes($data, $status, $msg) {
        $res = [
            'data' => $data,
            'status' => $status,
            'msg' => $msg
        ];

        return $res;
    }
}
