<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	if(isset($_GET['inactive']) && !isset($_GET['active']) ){
    		return User::where('status','inactive')->select('name','last_name','email','address','city','country','region','zip_code','home_phone','mobile_phone','work_phone','status')->get();
    	}elseif(isset($_GET['active']) && !isset($_GET['inactive'])){
    		return User::where('status','active')->select('name','last_name','email','address','city','country','region','zip_code','home_phone','mobile_phone','work_phone','status')->get();
    	}else{
    		return User::select('name','last_name','email','address','city','country','region','zip_code','home_phone','mobile_phone','work_phone','status')->get();
    	}
    }

    public function headings(): array
    {
        return [
            'First Name','Last Name','Email','Address','City','Country','Region','Zip Code','Home Phone','Mobile Phone','Work Phone','Status'
        ];
    }
}
