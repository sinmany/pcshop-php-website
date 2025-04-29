<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use Illuminate\Routing\Controller;

class ComputerController extends Controller
{

    protected $computer;

    public function __construct()
    {
        $this->computer = new Computer();
    }

    public function index()
    {
        $response['computer'] = $this->computer->all();
        return view('admin.index')->with($response);
    }

    // search
    public function search(Request $request)
    {
        $search = $request->input('search');

        // Query to search in 'name' and 'description' columns
        $computer = Computer::where('name', 'like', '%' . $search . '%')
            ->get();

        return view('admin.index', compact('computer'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|unique:computer,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $this->computer->create($validatedData);

        return redirect('admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insertcomputer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $computer = Computer::findOrFail($id);
        return view('computers.show', ['computer' => $computer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response['computer'] = $this->computer->find($id);
        return view('admin.edit')->with($response);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $computer = $this->computer->find($id);

        $computer->update(array_merge($computer->toArray(), $request->toArray()));
        return redirect('computer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $computer = $this->computer->find($id);

        $computer->delete();
        return redirect('admin');
    }
}
