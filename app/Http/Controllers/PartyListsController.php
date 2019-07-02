<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\PartyList;
// Direct DB call
use DB;

class PartyListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$party_lists = PartyList::all();
        $party_lists = PartyList::orderBy('created_at', 'desc')->paginate(10);
        return view('party_lists.index')->with('party_lists', $party_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('party_lists.create');
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
            'party_name' => 'required',
        ]);

        $party_list = new PartyList;
        $party_list->party_name = $request->input('party_name');
        $party_list->party_email = $request->input('party_email');
        $party_list->party_contact_person = $request->input('party_contact_person');
        $party_list->party_contact_number = $request->input('party_contact_number');
        $party_list->party_code = $request->input('party_code');
        $party_list->party_address = $request->input('party_address');
        $party_list->party_trade_licence_no = $request->input('party_trade_licence_no');
        $party_list->party_vat_no = $request->input('party_vat_no');
        $party_list->party_tin_no = $request->input('party_tin_no');
        $party_list->party_bank_name = $request->input('party_bank_name');
        $party_list->party_bank_ac_no = $request->input('party_bank_ac_no');
        $party_list->party_cheque_routing_no = $request->input('party_cheque_routing_no');
        $party_list->party_type = $request->input('party_type');
        if($request->input('published') == 0)
        {
            $party_list->published = 0;
        }
        else
        {
            $party_list->published = $request->input('published');
        }
        $party_list->deleted = 0;
        $party_list->save();

        return redirect('/party_lists')->with('sucess', 'Party Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $party_list = PartyList::find($id);

        return view('party_lists.show')->with('party_list', $party_list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $party_list = PartyList::find($id);

        return view('party_lists.edit')->with('party_list', $party_list);
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
            'party_name' => 'required',
        ]);
        

        // Update Product PartyList
        $party_list = PartyList::find($id);
        $party_list->party_name = $request->input('party_name');
        $party_list->party_email = $request->input('party_email');
        $party_list->party_contact_person = $request->input('party_contact_person');
        $party_list->party_contact_number = $request->input('party_contact_number');
        $party_list->party_code = $request->input('party_code');
        $party_list->party_address = $request->input('party_address');
        $party_list->party_trade_licence_no = $request->input('party_trade_licence_no');
        $party_list->party_vat_no = $request->input('party_vat_no');
        $party_list->party_tin_no = $request->input('party_tin_no');
        $party_list->party_bank_name = $request->input('party_bank_name');
        $party_list->party_bank_ac_no = $request->input('party_bank_ac_no');
        $party_list->party_cheque_routing_no = $request->input('party_cheque_routing_no');
        $party_list->party_type = $request->input('party_type');        
        if($request->input('published') == 0)
        {
            $party_list->published = 0;
        }
        else
        {
            $party_list->published = $request->input('published');
        }
        
        $party_list->save();

        return redirect('/party_lists')->with('sucess', 'Party Updated');
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
        $party_list = PartyList::find($id);

        // Check for correct user
       /** if(auth()->user()->id !== $product->user_id){
            return redirect('/products')->with('error', 'Unauthorized Page');
        }**/
        
        $party_list->delete();

        return redirect('/party_lists')->with('success', 'Party Removed');
    }
}
