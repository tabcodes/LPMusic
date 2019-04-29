<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Band;

class Album extends Model
{
    /**
     * Mass-assignable attributes of the album model.
     *
     * @var array
     */
    protected $fillable = ['name', 'band_id', 'recorded_date', 'release_date', 'number_of_tracks', 'label', 'producer', 'genre'];

    /**
     * Returns an array to be used as a set of validation rules for album-related requests.
     *
     * @return void
     */
    public static function validationFields()
    {
        return [
            'name' => 'required|max:255',
            'band_id' => 'required|exists:bands,id',
            'recorded_date' => 'nullable|date',
            'release_date' => 'nullable|date|after:recorded_date|before:tomorrow',
            'number_of_tracks' => 'nullable|numeric|min:1',
            'label' => 'nullable|max:255',
            'producer' => 'nullable|max:255',
            'genre' => 'nullable|max:255',
        ];
    }

    /**
     * Retrieves the band associated to this album.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
