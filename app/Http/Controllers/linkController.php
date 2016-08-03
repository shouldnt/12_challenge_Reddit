<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Link;


class linkController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$links = $request->user()->links()->get();

    	return view('links.index', compact('links'));
    }

    public function show(Request $request, Link $link)
    {
        $this->authorize('edit', $link);
        return view('links.show', compact("link"));
    }

    public function edit(Request $request, Link $link)
    {
        $this->validate($request, [
                'title' => 'required|max:255',
                'link' => 'required'            
            ]);        
        $this->authorize('edit', $link);
        $link->title = $request->title;
        $link->link = $request->link;
        $link->save();
        return back();
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    			'title' => 'required|max:255',
    			'link' => 'required'    		
    		]);

    	$request->user()->links()->create([
    			'title' => $request->title,
    			'link' => $request->link
    		]);

    	return redirect('links');
    }

    public function destroy(Request $request, Link $link)
    {
        $this->authorize('destroy', $link);

        $link->delete();

        return redirect('/links');
    }
}
