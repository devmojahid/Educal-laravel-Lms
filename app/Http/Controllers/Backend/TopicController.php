<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    public function storeTopic() {
        if(request()->ajax()) {
           try {
                $slug = Str::slug(request()['topic']['title']);
                $topic = Topic::where('slug', $slug)->first();
                if($topic) {
                $slug = $slug . '-' . time();
                }
                $topic = Topic::create([
                    'title' => sanitizeJsonInputPlainText(request()['topic']['title']),
                    'slug' => $slug,
                    'description' => sanitizeJsonInputPlainText(request()['topic']['description']),
                    'course_id' => request()['topic']['course_id'],
                ]);

                return response()->json([
                    'message' => 'Topic created successfully',
                    'topic' => $topic
                ]);

           } catch (\Throwable $th) {
                return response()->json([
                     'message' => 'Something went wrong',
                     'error' => $th->getMessage()
                ]);
           }
        }
    }

    //edit topic
    public function editTopic() {
        if(request()->ajax()) {
            try {
                $id = request()->id;
                $topic = Topic::find($id);
                return response()->json([
                    'topic' => $topic
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something went wrong',
                    'error' => $th->getMessage()
               ]);
            }
        }
    }

    //update topic
    public function updateTopic() {
        if(request()->ajax()) {
            $request = request();
            try {
                $id = $request->topic['id'];
                $topic = Topic::find($id);
                $slug = Str::slug($request->topic['title']);
                $topic_slug = Topic::where('slug', $slug)->first();
                if($topic_slug) {
                    $slug = $slug . '-' . time();
                }
                $topic->title = sanitizeJsonInputPlainText($request->topic['title']);
                $topic->slug = $slug;
                $topic->description = sanitizeJsonInputPlainText($request->topic['description']);
                $topic->save();

                return response()->json([
                    'message' => 'Topic updated successfully',
                    'topic' => $topic
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something went wrong',
                    'error' => $th->getMessage()
               ]);
            }
        }
    }

    //delete topic
    public function deleteTopic() {
        if(request()->ajax()) {
            try {
                $id = request()->id;
                $topic = Topic::find($id);
                $topic->delete();
                return response()->json([
                    'message' => 'Topic deleted successfully',
                    'topic' => $topic
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something went wrong',
                    'error' => $th->getMessage()
               ]);
            }
        }
    }

    // get topic by course id
    public function getTopic() {
        if(request()->ajax()) {
            try {
                $id = request()->course_id;
                $topics = Topic::with("lessons")->where('course_id', $id)->get();
                return response()->json([
                    'topics' => $topics
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'message' => 'Something went wrong',
                    'error' => $th->getMessage()
               ]);
            }
        }
    }
}
