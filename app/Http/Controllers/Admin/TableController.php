<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TableRequest;
use App\Models\Table;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View as ViewAlias;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|ViewAlias
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index', [
            'tables' => $tables
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|ViewAlias
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(TableRequest $request)
    {
        //        dd($request->all());

        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location
        ]);

        return to_route('admin.tables.index')->with('success', 'Table created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|ViewAlias
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(TableRequest $request, Table $table)
    {
        $table->update($request->validated());

        return to_route('admin.tables.index')->with('success', 'Table updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Table $table
     * @return RedirectResponse
     */
    public function destroy(Table $table): RedirectResponse
    {
        $table->reservations()->delete();
        $table->delete();
        return  to_route('admin.tables.index')->with('danger', 'Table deleted successfully');
    }
}
