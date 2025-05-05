<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWatchRequest;
use App\Http\Requests\StoreWatchRequest;
use App\Http\Requests\UpdateWatchRequest;
use App\Models\Category;
use App\Models\Watch;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WatchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('watch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $watches = Watch::with(['category'])->get();

        return view('admin.watches.index', compact('watches'));
    }

    public function create()
    {
        abort_if(Gate::denies('watch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.watches.create', compact('categories'));
    }

    public function store(StoreWatchRequest $request)
    {
        $watch = Watch::create($request->all());

        return redirect()->route('admin.watches.index');
    }

    public function edit(Watch $watch)
    {
        abort_if(Gate::denies('watch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $watch->load('category');

        return view('admin.watches.edit', compact('categories', 'watch'));
    }

    public function update(UpdateWatchRequest $request, Watch $watch)
    {
        $watch->update($request->all());

        return redirect()->route('admin.watches.index');
    }

    public function show(Watch $watch)
    {
        abort_if(Gate::denies('watch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $watch->load('category');

        return view('admin.watches.show', compact('watch'));
    }

    public function destroy(Watch $watch)
    {
        abort_if(Gate::denies('watch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $watch->delete();

        return back();
    }

    public function massDestroy(MassDestroyWatchRequest $request)
    {
        $watches = Watch::find(request('ids'));

        foreach ($watches as $watch) {
            $watch->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
