<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    /**
     * Mass-assignable attributes of the band model.
     *
     * @var array
     */
    protected $fillable = ['name', 'start_date', 'website', 'still_active'];

    /**
     * Returns an array to be used as a set of validation rules for band-related requests.
     *
     * @return void
     */
    public static function validationFields() {
        return [
            'name' => 'required|max:255',
            'start_date' => 'nullable|date',
            'website' => 'nullable|url',
            'still_active' => 'nullable|boolean',
        ];
    }

    /**
     * Retrieves the albums associated to this band.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function albums() {
        return $this->hasMany(Album::class);
    }

    /**
     * Returns a count of albums in the database associated to this band.
     *
     * @return int
     */
    public function albumCount() {
        return count($this->albums);
    }

    /**
     * Returns a formatted string based on this band's 'still_active' property.
     *
     * @return void
     */
    public function activeStatus() {
        return ($this->still_active) ? "Active" : "Inactive";
    }
}
