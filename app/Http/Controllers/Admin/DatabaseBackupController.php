<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\LogActivity;
use App\Http\Controllers\Controller;
use App\Model\Dump;
use App\Traits\DatatablTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

// use App\Helpers\LogActivity;

class DatabaseBackupController extends Controller
{
    use DatatablTrait;

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.settings.database-backup.database_backup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {

        return response()->json([
            'html' => view('admin.settings.database-backup.database_backup')->render()
        ]);
    }

    public function List(Request $request): JsonResponse
    {


        // Listing column to show
        $columns = array(
            0 => 'id',
            1 => 'created_at',
        );

        $totalData = Dump::count();
        $totalRec = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');


        $customcollections = Dump::when($search, function ($query, $search) {
            return $query->whereDate('created_at', '=', date('Y-m-d', strtotime($search)));
        });


        // dd($totalData);

        $totalFiltered = $customcollections->count();

        $customcollections = $customcollections->offset($start)->limit($limit)->orderBy($order, $dir)->get();

        $data = [];

        foreach ($customcollections as $key => $item) {


            if (empty($request->input('search.value'))) {
                $final = $totalRec - $start;
                $row['id'] = $final;
                $totalRec--;
            } else {
                $start++;
                $row['id'] = $start;
            }

            // $row['id'] = $item->id;

            $d = LogActivity::commonDateFromatType() . ' ' . 'h:i';


            $row['date'] = date($d, strtotime($item->created_at));

            $row['action'] = $this->action([
                'download' => route('database-backup.show', $item->id),
                'restore' => route('database-backup.restore', $item->id),
            ]);

            $data[] = $row;

        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        return response()->json($json_data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return BinaryFileResponse
     */
    public function show(int $id): BinaryFileResponse
    {
        $filename = Dump::findorfail($id)->file_name;
        return response()->download(storage_path("dumps/{$filename}"));
    }

    /**
     * Restore the specified database backup.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function restore(int $id): RedirectResponse
    {
        $filename = Dump::findorfail($id)->file_name;
        $path = Storage::disk('local')->path('dumps/' . $filename);
        $restore_file = storage_path() . '/dumps/' . $filename;
        $server_name = env("DB_HOST");
        $username = env("DB_DATABASE");
        $password = env("DB_USERNAME");
        $database_name = env("DB_PASSWORD");

        $cmd = "mysql -h {$server_name} -u {$username} -p{$password} {$database_name} < $restore_file";

        exec($cmd);

        Session::flash('success', "Backup Restore Successfully");
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return void
     */

    public function changeStatus(Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
