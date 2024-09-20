<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\History;
class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $histories = Histroy::where(auth()->id(),'user_id')
        ->with('formations')
        ->with('videos')
        ->orderBy('watched_at','desc')
        ->get();

        return response()->json($histories);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'formation_id'=>'required | exists:formations,id',
            'formation_videos_id'=>'required | exists:formation_videos,id'
        ]);

        History::updateOrCreate(
            ['user_id' => $request->user()->id, 'formation_id' => $request->formation_id,"formation_videos_id"=>$request->formation_video_id],
            ['watched_at' => now()]
        );
        return response()->json(['message'=>'histroy updated successfully. ']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $history = History::findOrFail($id);
        $history->delete();
        return response()->json('the history has been  deleted successfully.');
  }
}
