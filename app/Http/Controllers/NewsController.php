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
        $news = News::all();

        return response()->json($news, 200, ['application/json']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required',
            'title'     => 'required',
            'content'   => 'required',
            'image'     => 'required|image',
            'author'    => 'required',
            'ref'       => 'required'
        ]);
      
        $news = News::create([
            'user_id'   => $request->user_id,
            'title'     => $request->title,
            'content'   => $request->content,
            'image'     => $request->image,
            'author'    => $request->author,
            'ref'       => $request->ref
        ]);

        return response("News stored successfully", 200, ['application/json']);
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
                'ref'       => 'required'
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
                ->store('Event', 'vue');
            $event->image = $pathToFile;
        }
        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->event_type = $request->input('event_type');
        $event->location = $request->input('location');
        $event->content = $request->input('content');
        $event->user_id = $request->input('user_id');
        $event->author = $request->input('author');
        $event->updated_at = Carbon::now($this->TZ_OFFSET)->toDateTimeString();
        $event->save();
        
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
