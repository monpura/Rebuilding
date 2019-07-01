<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\UserGroup;
// Direct DB call
use DB;

class UserGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$usergroups = UserGroup::all();
        $usergroups = UserGroup::orderBy('created_at', 'desc')->paginate(10);
        return view('user_groups.index')->with('usergroups', $usergroups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_groups.create');
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
            'group_name' => 'required',
            'group_access_link' => 'required'
        ]);

        $group_access = '';
        if(isset($_POST['group_access_link'])){
            if (is_array($_POST['group_access_link'])) {
                foreach($_POST['group_access_link'] as $value){
                    $group_access .= $value . ',';
                    }
            } else {
                    $value = $_POST['group_access_link'];
                    $group_access .= $value;
               }
           }
           
        $group_access = rtrim($group_access,','); 
        // Create User Group
        $usergroup = new UserGroup;
        $usergroup->group_name = $request->input('group_name');
        $usergroup->group_access_link = $group_access;
        $usergroup->published = $request->input('published');
        $usergroup->deleted = 0;
        $usergroup->save();

        return redirect('/user_groups')->with('sucess', 'User Group Added');
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
        $usergroup = UserGroup::find($id);

        return view('user_groups.edit')->with('usergroup', $usergroup);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete product
        $usergroup = UserGroup::find($id);

        // Check for correct user
       /** if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error', 'Unauthorized Page');
        }**/
        
        $usergroup->delete();

        return redirect('/user_groups')->with('success', 'Product Removed');
    }
}
