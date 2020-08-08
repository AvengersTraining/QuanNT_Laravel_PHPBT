<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.users.index');
    }

    public function getDatatableIndex()
    {
        $users = User::all();

        $dataTables = new DataTables();

        return $dataTables->collection($users)
            ->setRowId('user_{{ $id }}')
            ->setRowAttr([
                'data-id' => '{{ $id }}',
                'data-username' => '{{ $username }}',
            ])
            ->editColumn('action', 'admin.pages.users.datatables.action')
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $validatedData = $request->validated();
        $name = $validatedData['name'] ?? null;
        $userName = $validatedData['username'] ?? null;

        $user = User::findOrFail($id);
        $user->name = $name;
        $user->username = $userName;
        $user->save();

        return redirect()->route('admin.users.index')->with('message', 'Update user successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'Delete user successfully');
    }
}
