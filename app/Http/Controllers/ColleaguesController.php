<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Colleague;

class ColleaguesController extends Controller
{
    /**
     * Create a new controller instance.
     * Allow guest account to access index or show only
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $colleagues = $user->colleagues->sortByDesc('score');
    
        return view('colleagues.index')->with('colleagues', $colleagues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colleagues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);

        $email = $request->input('email');
        $find_user = User::where('email', $email)->first();

        //Check if the email exist in the current users
        if($find_user == null){
            return redirect('/colleagues')->with('error', 'This user e-mail does not exist');
        }

        $user_id = auth()->user()->id;
        $currentColleagues = User::find($user_id)->colleagues;

        //Check is the user already added the email as colleague
        foreach($currentColleagues as $currentColleague){
            if($currentColleague->colleague_id == $find_user->id){
                return redirect('/colleagues')->with('error', 'This user e-mail is already a colleague');
            }
        }

        //create a new Colleague
        $colleague = new Colleague;
        $colleague->user_id = $user_id;
        $colleague->colleague_id = $find_user->id;
        $colleague->save();

        return redirect('/colleagues')->with('success', 'Colleague Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $colleague = User::find($id);
        return view('colleagues.show')->with('colleague', $colleague);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //No Edit function for Colleagues
        return redirect('/colleagues')->with('error', 'Page no found');
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
        //No Update function for Colleagues
        //A pseudo update can be found at ColleaguesController@Index function
        return redirect('/colleagues')->with('error', 'Page no found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete the 
        $user = User::find(auth()->user()->id);
        $delete_colleague = null;
        
        //Check for correct colleague id
        foreach($user->colleagues as $colleague){
            if($colleague->colleague_id == $id){
                $delete_colleague = $colleague;
            }
        }
        //If no match, return with error
        if($delete_colleague == null){
            return redirect('/colleagues')->with('error', 'No such colleague');
        }
        
        $delete_colleague->delete();

        return redirect('/colleagues')->with('success', 'Colleague Removed');
    }

    public function colleague_delete($colleague_id)
    {
        $user = User::find(auth()->user()->id);
        $delete_colleague = null;

        //Check for correct colleague id
        foreach($user->colleagues as $colleague){
            if($colleague->colleague_id == $colleague_id){
                $delete_colleague = $colleague;
            }
        }

        //If no match, return with error
        if($delete_colleague == null){
            return redirect('/colleagues')->with('error', 'No such colleague');
        }
        
        //Return a delete confirmation page
        $user = User::find($colleague_id);
        return view('colleagues.colleague_delete')->with('colleague', $user);
    }
    
}
