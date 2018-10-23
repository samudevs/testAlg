<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        User::create($request->only('name'));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::all();
        $user = User::findOrFail($id);

        return view('users.show', compact('users', 'user'));
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
    public function update(Request $request, $id)
    {
            $user1 = User::where('id', $id)->firstOrFail();

            $user1->createRelation($request->only('id'));  

        return back(); 
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

    //CUSTOM

    public function search(Request $request) {
        $users = User::all();
        try {
            $user = User::where('name', $request->only('name'))->firstOrFail();
        } catch (\Exception $e){
            return redirect('/'); 
        }

        return redirect('users/' . $user->id);
    }

    public function stats() {
        $relations = User::withCount('relations')->orderBy('relations_count')->get();
        $most = array_count_values($relations->pluck('relations_count')->toArray());
        arsort($most);
        $most = collect(array_slice(array_keys($most), 0, 1, true));


        $stats = collect([
            'count' => $relations->pluck('relations_count')->sum() / 2,
            'avg' => $relations->avg('relations_count'),
            'max' => [$relations->last()->name, $relations->last()->relations_count],
            'min' => [$relations->first()->name, $relations->first()->relations_count],
            'most' => $most[0]
        ]);

        return view('users.stats', compact('stats'));
    }
}
