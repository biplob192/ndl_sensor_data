<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\BaseController;
use App\Interfaces\ThingspeakRepositoryInterface;

class ThingspeakRepository extends BaseController implements ThingspeakRepositoryInterface
{
    public function index()
    {
        try {
            $response = Http::get('https://thingspeak.com/channels/1857200/feed.json');
            return view('thingspeak.index', ['response' => $response['feeds'], 'channel' => $response['channel']]);
        } catch (Exception $e) {

            $error = $e->getMessage();
            return $this->sendError('Internal server error.', $error, 500);
        }
    }

    public function getData($request)
    {
        try {
            $response = Http::get('https://thingspeak.com/channels/1857200/feed.json');

            // Define the default page and perPage values
            $perPage        = $request->input("length", 10);
            $searchValue    = $request->search['value'];
            $start          = $request->input("start");
            $orderBy        = 'id';
            $order          = 'desc';


            $datasQuery = $response->query()
                ->when($searchValue, function ($query, $searchValue) {
                    $query->where(function ($query) use ($searchValue) {
                        $query->where('field1', 'like', '%' . $searchValue . '%')
                            ->orWhere('field2', 'like', '%' . $searchValue . '%')
                            ->orWhere('field3', 'like', '%' . $searchValue . '%');
                    });
                });

            $recordsFiltered = $datasQuery->count();


            if ($perPage != -1 && is_numeric($perPage)) {
                $datasQuery->offset($start)->limit($perPage);
            }

            $datas = $datasQuery->orderBy($orderBy, $order)->get();
            $allDatas = array();
            foreach ($datas as $data) {
                $singleData = [$data->entry_id, $data->field1, $data->field2, $data->field3, $data->created_at, '', ''];
                array_push($allDatas, $singleData);
                $singleData = [''];
            }


            return ['data' => $allDatas, 'recordsTotal' => $response->count(), 'recordsFiltered' => $recordsFiltered, 'status' => 200];
        } catch (Exception $e) {

            $error = $e->getMessage();
            return $this->sendError('Internal server error.', $error, 500);
        }
    }
}
