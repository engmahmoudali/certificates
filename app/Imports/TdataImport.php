<?php

namespace App\Imports;

use App\Models\Tdatum;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TdataImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        // $date = new Carbon($row['Date']);

        return new Tdatum([
            'name' => $row['trainee'] ?? 'Not Set',
            'serial' => $row['id'] ?? '0',
            'num' => $row['ic'] ?? 0,
            'certificate_num' => $this->updateString($row['ib']??null,$row['id']??null,$row['ic']??null) ?? 'Not Set',
            'document_type' => $row['document_type'] ?? 'Not Set',
            'date' => $row['date'] ?? 'Not Set',
            // 'date' => $this->reformateDate($row['date'] ?? now()->format('Y-m-d')),
            'coach_name' => $row['trainer'] ?? 'Not Set',
            'nation' => $row['nationality'] ?? 'Not Set',
            'notes' => $row['notes'] ?? 'NO',
        ]);
    }

    private function updateString($string,$v1,$v2)
    {
        if ($v1 == null || $v1 == '') $v1="0";
        if ($v2 == null || $v2 == '') $v2="0";

        if ($string == null || $string == '') {
            return $v1.$v2;
        }

        if (strlen(trim($string)) > 10) {
            return $v1.$v2;
        }else{
            return $string;
        }
    }

    // private function reformateDate($date)
    // {
    //     // $date = Carbon::createFromFormat('yy/mm/dd', $date);
    //     $date = new Carbon($date);
    //     // $date = Carbon::createFromFormat('d/m/Y', $date);
    //     if ($date)
    //     return $date->format('Y-m-d');
    //     else return now()->format('Y-m-d');
    // }

    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row){
    //         $date = new Carbon($row['Date']);
    //         $data = Tdatum::create([
    //             'name' => $row['Trainee'] ?? 'Not Set',
    //             'serial' => $row['ID'] ?? 'Not Set',
    //             'num' => $row['IC'] ?? 'Not Set',
    //             'certificate_num' => $row['IB'] ?? 'Not Set',
    //             'document_type' => $row['Document_type'] ?? 'Not Set',
    //             'date' => $date->format('Y-m-d'),
    //             'coach_name' => $row['Trainer'] ?? 'Not Set',
    //             'nation' => $row['Nationality'] ?? 'Not Set',
    //             'notes' => $row['Notes'] ?? 'NO',
    //         ]);
    //     }
    //     return $rows;
    // }


    public function rules(): array
    {
        return [
            'Trainee' => 'required',
            'ID' => 'required',
            'IC' => 'required',
            'IB' => 'required',
            'Document_type' => 'required',
            'Date' => 'required',
            'Trainer' => 'required',
            'Nationality' => 'required',
            'Notes' => 'required',     
        ];
    }
}
