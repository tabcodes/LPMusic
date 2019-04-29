<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Band;


class BandController extends Controller
{

    /**
     * Display a listing of all bands.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bands = Band::all();

        return view("bands.index")
            ->with("bands", $bands);
    }

    /**
     * Show the form for creating a new band.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("bands.create-update");
    }

    /**
     * Store a newly created band in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            Band::validationFields()
        );

        try {
            $band = Band::create($request->all());
        } catch (Exception $e) {
            return redirect()->route('band.index')
                ->with('status', 'failure')
                ->with('message', __('messages.general_error'));
        }

        return redirect()->route('band.index')
            ->with('status', 'success')
            ->with('message', __('messages.band_created', ['band_name' => $band->name]));
    }

    /**
     * Show the form for editing the specified band.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $band = Band::findOrFail($id);

        return view("bands.create-update")
            ->with("band", $band);
    }


    /**
     * Show the specified band.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $band = Band::findOrFail($id);

        return view("bands.show")
            ->with("band", $band);
    }


    /**
     * Update the specified band in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {

        $request->validate(
            Band::validationFields()
        );

        $band = Band::findOrFail($id);

        try {
            $band->update($request->all());
        } catch (Exception $e) {
            return redirect()->route('band.index')
                ->with('status', 'failure')
                ->with('message', __('messages.general_error'));
        }

        return redirect()->route('band.index')
            ->with('status', 'success')
            ->with('message', __('messages.general_updated'));
    }

    /**
     * Remove the specified band from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $band = Band::findOrFail($id);

        try {
            $band->delete();
        } catch (Exception $e) {
            return redirect()->route('band.index')
                ->with('status', 'failure')
                ->with('message', __('messages.general_error'));
        }

        return redirect()->route('band.index')
            ->with('status', 'success')
            ->with('message', __('messages.band_deleted'));
    }
}
