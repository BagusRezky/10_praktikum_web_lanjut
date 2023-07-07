<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = "matakuliah";
    /**
     * The roles that belong to the Matakuliah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(MahasiswaMatakuliah::class);
    }
}
