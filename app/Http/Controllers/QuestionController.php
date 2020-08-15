<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\question_tag;
use Illuminate\Support\Facades\Auth;
use App\tag;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Question::where('user_id', Auth::user()->id)->orderBy('question_title')->get();
        // dd($datas);
        return view('ManageQuestion', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('QuestionCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'question_title' => 'required|unique:questions',
            'question_body' => 'required',
            'tag' => 'required'
        ]);

        // dd($request->all());
        $tags = substr($request['tag'],1,strlen($request['tag']));
        $tag_arr = explode('#', $tags);
        $tag_id = [];
        // dd($tag_arr);
        foreach($tag_arr as $tag_name){
            $check = tag::where('tag',$tag_name)->first();
            if($check != null){
                $tag_id[] = $check['tag_id'];
            }else{
                $new_tag = tag::create(['tag'=>$tag_name]);
                $tag_id[] = $new_tag->id;
            }
        }

        $data = Question::create([
            'question_title' => $request['question_title'],
            'question_body' => $request['question_body'],
            'user_id' => Auth::user()->id
        ]);

        $data->tags()->sync($tag_id);

        return redirect('/question')->with('success','Success Creating New Discusion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Question::where('question_id',$id)->first();
        $tags = question_tag::where('question_id',$id)->get();
        $tag_string = [];

        foreach ($tags as $tag) {
            $tag_col = tag::where('tag_id',$tag['tag_id'])->first();
            $tag_string[] = $tag_col['tag'];
        }
        $a = '#'. implode('#',$tag_string);
        $tag = array('tag'=> $a);
        // dd($tag);

        return view('EditDiscussion',compact('data','tag'));
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
        $request->validate([
            'question_title' => 'required',
            'question_body' => 'required',
            'tag' => 'required'
        ]);

        // dd($request->all());
        $tags = substr($request['tag'],1,strlen($request['tag']));
        $tag_arr = explode('#', $tags);
        $tag_id = [];
        // dd($tag_arr);
        foreach($tag_arr as $tag_name){
            $check = tag::where('tag',$tag_name)->first();
            if($check != null){
                $tag_id[] = $check['tag_id'];
            }else{
                $new_tag = tag::create(['tag'=>$tag_name]);
                $tag_id[] = $new_tag->id;
            }
        }

        $data = Question::where('question_id',$id)
        ->update([
            'question_title' => $request['question_title'],
            'question_body' => $request['question_body'],
            'user_id' => Auth::user()->id
        ]);

        foreach ($tag_id as $tagId) {
            $check = question_tag::where([
                ['question_id',$id],
                ['tag_id',$tagId]
            ])->first();
            if($check == null){
                question_tag::create([
                    'tag_id' => $tagId,
                    'question_id' => $id

                ]);
            }
        }
        return redirect('/question')->with('success','Success Editing Discusion');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id)
    {
        DB::table('question_tag')->where('question_id',$question_id)->delete();
        DB::table('questions')->where('question_id',$question_id)->delete();
        return redirect('/question')->with('success','success deleting discussion');
    }
}
