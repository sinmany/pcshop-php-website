<?php

namespace App\Http\Controllers;

use App\Models\Accessary;
use Illuminate\Http\Request;

class AccessaryController extends Controller
{

    protected $accessary;

    public function __construct()
    {
        $this->accessary = new Accessary();
    }

    public function index()
    {
        $response['accessary'] = $this->accessary->all();
        return view('admin.accessary')->with($response);
    }

    // search
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Query to search in 'name' and 'description' columns
        $accessary = Accessary::where('name', 'like', '%' . $search . '%')
            ->get();

        return view('admin.accessary', compact('accessary'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:accessary,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $this->accessary->create($validatedData);

        return redirect('/accessary');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $accessary = Accessary::findOrFail($id);
        return view('accessary.show', ['accessary' => $accessary]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['accessary'] = $this->accessary->find($id);
        return view('admin.accessaryedit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $accessary = $this->accessary->find($id);

        $accessary->update(array_merge($accessary->toArray(), $request->toArray()));
        return redirect('accessary');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $accessary = $this->accessary->find($id);

        $accessary->delete();
        return redirect('/accessary');
    }
}
