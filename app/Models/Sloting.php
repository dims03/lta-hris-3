<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sloting extends Model
{
    protected $table = 'sloting';
    
    protected $fillable = [
        'kd',
        'm_department_id',
        'm_department_jabatan_id',
        'm_cabang_id',
        'm_divisi_id',
        'users_id'
    ];

    protected $appends = [
        'employee','department','jabatan','cabang','divisi'
    ];

    public function getEmployeeAttribute()
    {
        return User::find($this->users_id);
    }

    public function getDepartmentAttribute()
    {
        return Department::find($this->m_department_id);
    }

    public function getJabatanAttribute()
    {
        return DepartmentJabatan::find($this->m_department_jabatan_id);
    }

    public function getCabangAttribute()
    {
        return Cabang::find($this->m_cabang_id);
    }

    public function getDivisiAttribute()
    {
        return Divisi::find($this->m_divisi_id);
    }
}
