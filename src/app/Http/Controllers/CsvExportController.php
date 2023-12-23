<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;

class CsvExportController extends Controller
{
    public function export(Request $request)
    {
        $nameOrEmail = $request->input('name_or_email');
        $gender = $request->input('gender');
        $content = $request->input('content');
        $day= $request->input('created_at');

        $contacts = Contact::query();

        if ($nameOrEmail) {
        $contacts->where(function ($query) use ($nameOrEmail) {
            $query->where('first_name', 'like', "%$nameOrEmail%")
                ->orWhere('last_name', 'like', "%$nameOrEmail%")
                ->orWhere('email', 'like', "%$nameOrEmail%");
        });
        }

        if ($gender && $gender !== '0'){
        $contacts->where('gender', $gender);
        }

        if ($content) {
        $contacts->where('category_id', $content);
        }

        if ($day) {
        $contacts->where('created_at', $day);
        }

        if (!$request->hasAny(['name_or_email', 'gender', 'content', 'day'])) {
        $contacts = Contact::all();
        }

        $data = $contacts->get();

        if ($request->has('export_csv')) {

            $headers=[
                'Content-Type'=>'text/csv',
                'Content-Disposition'=>'attachment;filename="export.csv"',
            ];

            $callback=function()use($data){
                $file=fopen('php://output','w');

                fputcsv($file,['姓','名','性別','メール','お問い合わせの種類']);

                foreach($data as $row){
                    $gender=$this->getGenderLabel($row->gender);
                    $category=$this->getCategoryName($row->category_id);
                    fputcsv($file,[
                        $row->first_name,
                        $row->last_name,
                        $gender,
                        $row->email,
                        $category,
                    ]);
                }
                fclose($file);
            };

        return Response::stream($callback,200,$headers);
        }
    }
        private function getGenderLabel($genderId)
        {
            $gender=[
                1=>'男性',
                2=>'女性',
                3=>'その他',
            ];
            return $gender[$genderId] ??'';
    }

    private function getCategoryName($category_id)
    {
        $category=Category::find($category_id);
        return $category ? $category->content : '';
    }
}
