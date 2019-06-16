<?php

namespace App\Http\Controllers\Admin;

use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWorksRequest;
use App\Http\Requests\Admin\UpdateWorksRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class WorksController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Work.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('work_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('work_delete')) {
                return abort(401);
            }
            $works = Work::onlyTrashed()->get();
        } else {
            $works = Work::all();
        }

        return view('admin.works.index', compact('works'));
    }

    /**
     * Show the form for creating new Work.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('work_create')) {
            return abort(401);
        }
        return view('admin.works.create');
    }

    /**
     * Store a newly created Work in storage.
     *
     * @param  \App\Http\Requests\StoreWorksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorksRequest $request)
    {
        if (! Gate::allows('work_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $work = Work::create($request->all());



        return redirect()->route('admin.works.index');
    }


    /**
     * Show the form for editing Work.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('work_edit')) {
            return abort(401);
        }
        $work = Work::findOrFail($id);

        return view('admin.works.edit', compact('work'));
    }

    /**
     * Update Work in storage.
     *
     * @param  \App\Http\Requests\UpdateWorksRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorksRequest $request, $id)
    {
        if (! Gate::allows('work_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $work = Work::findOrFail($id);
        $work->update($request->all());



        return redirect()->route('admin.works.index');
    }


    /**
     * Display Work.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('work_view')) {
            return abort(401);
        }
        $work = Work::findOrFail($id);

        return view('admin.works.show', compact('work'));
    }


    /**
     * Remove Work from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('work_delete')) {
            return abort(401);
        }
        $work = Work::findOrFail($id);
        $work->delete();

        return redirect()->route('admin.works.index');
    }

    /**
     * Delete all selected Work at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('work_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Work::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Work from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('work_delete')) {
            return abort(401);
        }
        $work = Work::onlyTrashed()->findOrFail($id);
        $work->restore();

        return redirect()->route('admin.works.index');
    }

    /**
     * Permanently delete Work from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('work_delete')) {
            return abort(401);
        }
        $work = Work::onlyTrashed()->findOrFail($id);
        $work->forceDelete();

        return redirect()->route('admin.works.index');
    }
}
