<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beneficiary_type()
    {
        return $this->belongsTo(BeneficiaryType::class);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function household_composition()
    {
        return $this->belongsTo(HouseholdComposition::class);
    }

    public function uploaded_id()
    {
        return $this->belongsTo(UploadedId::class);
    }
}
