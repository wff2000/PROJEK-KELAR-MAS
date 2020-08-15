<?php

namespace App\Http\Controllers;

use App\Answer;
use App\answer_user_vote;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Upstore(Request $request ,$id)
    {
        $check = answer_user_vote::where([
            ['user_id',Auth::user()->id],
            ['answer_id',$id]
        ])->first();

        if ($check == null) {
            answer_user_vote::create([
                'user_id' => Auth::user()->id,
                'answer_id' => $id
            ]);

            User::where('id',Auth::user()->id)
            ->update([
                'reputation_point' => DB::raw('reputation_point + 10')
            ]);
            return redirect('/question/explore/'. $request['question_id'])->with('success','Success Vote Answer');
        }else{
            return redirect('/question/explore/'. $request['question_id'])->with('success','You Have Been Vote Answer');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Downstore(Request $request ,$id)
    {
        $check = answer_user_vote::where([
            ['user_id',Auth::user()->id],
            ['answer_id',$id]
        ])->first();

        $check2 = User::where('id',Auth::user()->id)->first();

        if($check2->reputaion_point <= 15){
            return redirect('/question/explore/'. $request['question_id'])->with('success','Your Reputation Poin Is under 15');
        }else if($check2 != null){
            return redirect('/question/explore/'.$id)->with('success','You Have Been Vote Discusion');
        }else if ($check == null && $check2->reputaion_point > 15) {
            answer_user_vote::create([
                'user_id' => Auth::user()->id,
                'answer_id' => $id
            ]);

            User::where('id',Auth::user()->id)
            ->update([
                'reputation_point' => DB::raw('reputation_point - 1')
            ]);
            return redirect('/question/explore/'. $request['question_id'])->with('success','Success Vote Answer');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $answer_id)
    {
        // dd($request->all());
        if($request['user_id'] != Auth::user()->id){
            Answer::where('answer_id',$answer_id)
            ->update([
                'relevansi' => 1
            ]);

            User::where('id',$request['user_id'])
                ->update([
                    'reputation_point' => DB::raw('reputation_point + 15')
                ]);
            return redirect('/question/explore/'. $request['question_id'])->with('success','Succees To Aprove The Answer');
        }else{
            return redirect('/question/explore/'. $request['question_id'])->with('success','You Cannot Approve Your Answer');
        }

        // $data = Question::where('question_id',$id)
        // ->update([
        //     'question_title' => $request['question_title'],
        //     'question_body' => $request['question_body'],
        //     'user_id' => Auth::user()->id
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
