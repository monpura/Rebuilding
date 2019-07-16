<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\ActionType;
// Direct DB call
use DB;

class ActionTypesController extends Controller
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
        $action_types = ActionType::withTrashed()->orderBy('created_at', 'desc')->paginate(10);
        //$action_types = ActionType::onlyTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return response()->json([
            'action_types' => $action_types,
        ], 200);
        //return view('action_types.index')->with('action_types', $action_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('action_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // From validation
        $this->validate($request, [
            'action_type' => 'required',
        ]);

        // Create Action Type
        $action_type = new ActionType;
        $action_type->action_type = $request->input('action_type');
        if($request->input('published') == 0)
        {
            $action_type->published = 0;
        }
        else
        {
            $action_type->published = $request->input('published');
        }
        $action_type->save();

        return redirect('/action_types')->with('sucess', 'Action Type Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action_type = ActionType::find($id);

        return view('action_types.show')->with('action_type', $action_type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action_type = ActionType::find($id);

        return view('action_types.edit')->with('action_type', $action_type);
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
        // From validation
        $this->validate($request, [
            'action_type' => 'required',
        ]);

        // Create action_type
        $action_type = ActionType::find($id);
        $action_type->action_type = $request->input('action_type');
        if($request->input('published') == 0)
        {
            $action_type->published = 0;
        }
        else
        {
            $action_type->published = $request->input('published');
        }
        $action_type->save();

        return redirect('/action_types')->with('sucess', 'Action Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Action_Type
        //ActionType::destroy($id);
        $action_type = ActionType::find($id);

        // Check for correct user
       /** if(auth()->user()->id !== $action_type->user_id){
            return redirect('/action_types')->with('error', 'Unauthorized Page');
        }**/
        
        $action_type->delete();

        return redirect('/action_types')->with('success', 'Action Type Removed');
    }
    
    public function bin(){
        $deleted_action_types = ActionType::onlyTrashed()->orderBy('created_at', 'desc')->paginate(10);
        //$action_types = ActionType::onlyTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return view('action_types.bin')->with('deleted_action_types', $deleted_action_types);
    }

    public function restore($id) 
    {
        $action_type = ActionType::withTrashed()->find($id)->restore();
        return redirect('/action_types/bin')->with('success', 'Action Type Restored');
    }    
}
