<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Album;
use Band;

class AlbumController extends Controller
{
    /**
     * Display a list of albums.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $albums = Album::all();

        return view("albums.index")
            ->with("albums", $albums);
    }

    /**
     * Show the form for creating a new album.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("albums.create-update");
    }

    /**
     * Store a newly created album in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            Album::validationFields()
        );

        try {
            $album = Album::create($request->all());
        } catch (Exception $e) {
            return redirect()->route('album.index')
                ->with('status', 'failure')
                ->with('message', __('messages.general_error'));
        }

        return redirect()->route('album.index')
            ->with('status', 'success')
            ->with('message', __('messages.album_created', ['album_name' => $album->name]));
    }

    /**
     * Show the form for editing the specified album.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);

        return view("albums.create-update")
            ->with("album", $album);
    }

    /**
     * Show the specified album.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);

        return view("albums.show")
            ->with("album", $album);
    }

    /**
     * Update the specified album in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            Album::validationFields()
        );

        $album = Album::findOrFail($id);

        try {
            $album->update($request->all());
        } catch (Exception $e) {
            return redirect()->route('album.index')
                ->with('status', 'failure')
                ->with('message', __('messages.general_error'));
        }

        return redirect()->route('album.index')
            ->with('status', 'success')
            ->with('message', __('messages.general_updated'));
    }

    /**
     * Remove the specified album from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);

        try {
            $album->delete();
        } catch (Exception $e) {
            return redirect()->route('album.index')
                ->with('status', 'failure')
                ->with('message', __('messages.general_error'));
        }

        return redirect()->route('album.index')
            ->with('status', 'success')
            ->with('message', __('messages.album_deleted'));
    }
}
