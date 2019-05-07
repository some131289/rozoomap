<?php

namespace App\Http\Controllers\Admin;

use App\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDisciplinesRequest;
use App\Http\Requests\Admin\UpdateDisciplinesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class DisciplinesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Discipline.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('discipline_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('discipline_delete')) {
                return abort(401);
            }
            $disciplines = Discipline::onlyTrashed()->get();
        } else {
            $disciplines = Discipline::all();
        }

        return view('admin.disciplines.index', compact('disciplines'));
    }

    /**
     * Show the form for creating new Discipline.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('discipline_create')) {
            return abort(401);
        }
        return view('admin.disciplines.create');
    }

    /**
     * Store a newly created Discipline in storage.
     *
     * @param  \App\Http\Requests\StoreDisciplinesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDisciplinesRequest $request)
    {
        if (! Gate::allows('discipline_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $discipline = Discipline::create($request->all());



        return redirect()->route('admin.disciplines.index');
    }


    /**
     * Show the form for editing Discipline.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('discipline_edit')) {
            return abort(401);
        }
        $discipline = Discipline::findOrFail($id);

        return view('admin.disciplines.edit', compact('discipline'));
    }

    /**
     * Update Discipline in storage.
     *
     * @param  \App\Http\Requests\UpdateDisciplinesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDisciplinesRequest $request, $id)
    {
        if (! Gate::allows('discipline_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $discipline = Discipline::findOrFail($id);
        $discipline->update($request->all());



        return redirect()->route('admin.disciplines.index');
    }


    /**
     * Display Discipline.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('discipline_view')) {
            return abort(401);
        }
        $categories = \App\Category::where('discipline_id', $id)->get();

        $discipline = Discipline::findOrFail($id);

        return view('admin.disciplines.show', compact('discipline', 'categories'));
    }


    /**
     * Remove Discipline from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('discipline_delete')) {
            return abort(401);
        }
        $discipline = Discipline::findOrFail($id);
        $discipline->delete();

        return redirect()->route('admin.disciplines.index');
    }

    /**
     * Delete all selected Discipline at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('discipline_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Discipline::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Discipline from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('discipline_delete')) {
            return abort(401);
        }
        $discipline = Discipline::onlyTrashed()->findOrFail($id);
        $discipline->restore();

        return redirect()->route('admin.disciplines.index');
    }

    /**
     * Permanently delete Discipline from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('discipline_delete')) {
            return abort(401);
        }
        $discipline = Discipline::onlyTrashed()->findOrFail($id);
        $discipline->forceDelete();

        return redirect()->route('admin.disciplines.index');
    }
}
