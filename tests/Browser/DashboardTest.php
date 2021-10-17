<?php

namespace Tests\Browser;

use App\Helpers\LogActivity;
use App\Model\AdvocateClient;
use App\model\Appointment;
use App\Model\CaseStatus;
use App\Model\CaseType;
use App\Model\CourtCase;
use App\Model\CourtType;
use App\Model\Judge;
use Illuminate\Support\Facades\DB;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test */
    public function test_get_cases_status_to_dashboard()
    {

        $this->expectNotToPerformAssertions();
        $totalData = DB::table('court_cases AS case')
            ->leftJoin('advocate_clients AS ac', 'ac.id', '=', 'case.advo_client_id')
            ->leftJoin('case_types AS ct', 'ct.id', '=', 'case.case_types')
            ->leftJoin('case_types AS cst', 'cst.id', '=', 'case.case_sub_type')
            ->leftJoin('case_statuses AS s', 's.id', '=', 'case.case_status')
            ->leftJoin('court_types AS t', 't.id', '=', 'case.court_type')
            ->leftJoin('courts AS c', 'c.id', '=', 'case.court')
            ->leftJoin('judges AS j', 'j.id', '=', 'case.judge_type')
            ->select('case.id AS case_id', 'case.next_date', 'case.client_position', 'case.party_name', 'case.party_lawyer', 'case.case_number', 'case.act', 'case.priority',
                'case.court_no', 'case.judge_name', 'ct.case_type_name AS caseType', 'cst.case_type_name AS caseSubType',
                's.case_status_name', 't.court_type_name', 'c.court_name', 'j.judge_name', 'ac.first_name', 'ac.middle_name', 'ac.last_name'
            )
            ->where('case.is_active', 'Yes')
            ->where('case.is_nb', 'No')
            ->orderBy('case.id', 'desc')
            ->get()->groupBy('court')->toArray();
        return array_shift($totalData);
    }

    /** @test */
    public function test_get_cases_using_ids_to_dashboard(): array
    {

        $this->expectNotToPerformAssertions();
        $totalData = DB::table('court_cases AS case')
            ->leftJoin('case_logs AS cl', 'cl.court_case_id', '=', 'case.id')
            ->leftJoin('advocate_clients AS ac', 'ac.id', '=', 'case.advo_client_id')
            ->leftJoin('case_types AS ct', 'ct.id', '=', 'case.case_types')
            ->leftJoin('case_types AS cst', 'cst.id', '=', 'case.case_sub_type')
            ->leftJoin('case_statuses AS s', 's.id', '=', 'case.case_status')
            ->select('case.id AS case_id', 'cl.bussiness_on_date', 'cl.hearing_date', 'case.client_position', 'case.party_name', 'case.party_lawyer', 'case.registration_number', 'case.act', 'case.priority',
                'case.court_no', 'case.judge_name', 'ct.case_type_name AS caseType', 'cst.case_type_name AS caseSubType',
                's.case_status_name', 'ac.first_name', 'ac.middle_name', 'ac.last_name'
            )
            ->where('case.is_active', 'Yes')
            ->where('case.is_nb', 'No')
            ->distinct()
            ->get()->toArray();
        return $totalData;

    }

    /** @test */
    public function test_get_case_count_to_dashboard()
    {
        $this->expectNotToPerformAssertions();
        $date = date('Y-m-d');
        $data['date'] = $date;

        if (isset($request->client_case) && !empty($request->client_case)) {

            $date = date('Y-m-d', strtotime(LogActivity::commonDateFromat($request->client_case)));
            $data['date'] = $date;
        }

        $casesCount = DB::table('court_cases AS case')
            ->leftJoin('case_logs AS cl', 'cl.court_case_id', '=', 'case.id')
            ->leftJoin('advocate_clients AS ac', 'ac.id', '=', 'case.advo_client_id')
            ->leftJoin('case_types AS ct', 'ct.id', '=', 'case.case_types')
            ->leftJoin('case_types AS cst', 'cst.id', '=', 'case.case_sub_type')
            ->leftJoin('case_statuses AS s', 's.id', '=', 'case.case_status')
            ->select('case.id AS case_id', 'cl.bussiness_on_date', 'cl.hearing_date', 'case.client_position', 'case.party_name', 'case.party_lawyer', 'case.registration_number', 'case.act', 'case.priority',
                'case.court_no', 'case.judge_name', 'ct.case_type_name AS caseType', 'cst.case_type_name AS caseSubType',
                's.case_status_name', 'ac.first_name', 'ac.middle_name', 'ac.last_name'
            )
            ->where('case.is_active', 'Yes')
            ->where('case.is_nb', 'No')
            ->where('cl.bussiness_on_date', $date)
            ->distinct()
            ->get()->toArray();

        $data['totalCaseCount'] = count($casesCount);
        $totalData = DB::table('case_logs AS cl')
            ->Join('judges AS j', 'j.id', '=', 'cl.judge_type')
            ->Join('court_cases AS case', 'case.id', '=', 'cl.court_case_id')
            ->where('case.is_nb', 'No')
            ->select('cl.judge_type', 'j.judge_name')
            ->whereDate('cl.bussiness_on_date', '>=', $date)
            ->whereDate('cl.bussiness_on_date', '<=', $date)
            ->distinct()
            ->get();

        $res = array();
        if (count($totalData) > 0 && !empty($totalData)) {
            $arrCourt = $totalData;

            foreach ($arrCourt as $key => $case_detail) {

                $court_case_ids = DB::table('case_logs AS cl')
                    ->where('judge_type', $case_detail->judge_type)
                    ->where('bussiness_on_date', $date)
                    ->pluck('court_case_id')
                    ->toArray();

                if (!empty($this->getcasesByIds($court_case_ids, $case_detail->judge_type, $date))) {
                    $res[$key]['judge_name'] = $case_detail->judge_name;
                    $res[$key]['cases'] = $this->getcasesByIds($court_case_ids, $case_detail->judge_type, $date);
                }
            }
        }

        $data['case_dashbord'] = $res;
        $data['client'] = AdvocateClient::count();
        $data['appointmentCount'] = Appointment::count();
        $data['important_case'] = CourtCase::where('priority', 'High')->where('is_active', 'Yes')->count();
        $data['case_total'] = DB::table('court_cases AS case')
            ->where('is_active', 'Yes')
            ->count();
        $data['archived_total'] = CourtCase::where('is_active', 'No')->count();

        $getAppointment = DB::table('appointments AS a')
            ->leftJoin('advocate_clients AS ac', 'ac.id', '=', 'a.client_id')
            ->select('a.id AS id', 'a.is_active AS status', 'a.date AS date', 'a.name AS name', 'a.name AS appointment_name', 'ac.first_name AS first_name', 'ac.last_name AS last_name', 'a.client_id AS client_id', 'a.type As type')
            ->where('a.is_active', 'OPEN')
            ->where('a.date', date('Y-m-d'))
            ->get();
        $data['appoint_calander'] = $getAppointment;
        $data['caseTypes'] = CaseType::where('parent_id', 0)->where('is_active', 'Yes')->orderBy('created_at', 'desc')->get();
        $data['caseStatuses'] = CaseStatus::where('is_active', 'Yes')->orderBy('created_at', 'desc')->get();
        $data['courtTypes'] = CourtType::where('is_active', 'Yes')->orderBy('created_at', 'desc')->get();
        $data['judges'] = Judge::where('is_active', 'Yes')->orderBy('created_at', 'desc')->get();

        return view('admin.index', $data);
    }

    /** @test */
    public function test_get_case_appointment_data_to_calendar(): string
    {
        $this->expectNotToPerformAssertions();
        $CourtCase = DB::table('case_logs AS cl')
            ->join('court_cases AS case', 'cl.court_case_id', '=', 'case.id')
            ->select('case.id as id', 'case.filing_number as title', 'cl.bussiness_on_date as start')
            ->get();

        if (!empty($CourtCase)) {
            foreach ($CourtCase as &$value1) {
                $value1->color = '#27c24c';
                $value1->refer = "case";
                $value1->start = date('Y-m-d', strtotime($value1->start));
            }
        }

        $appointment = Appointment::select('client_id', 'type', 'id', 'name AS title', 'created_at as color', DB::raw('DATE_FORMAT(date, "%Y-%m-%d") as start'))
            ->where('is_active', 'OPEN')
            ->get();

        if (!empty($appointment)) {

            foreach ($appointment as &$value) {
                if ($value->type == "exists") {

                    $client = AdvocateClient::where('id', $value->client_id)->first();
                    $value->title = $client->first_name . ' ' . $client->last_name;

                }
                $value->refer = "appointment";
                $value->color = '#f05050';

                unset($value->client_id);
                unset($value->type);
            }
        }
        $CourtCase = collect($CourtCase)->toArray();
        $appointment = collect($appointment)->toArray();
        $merg = array_merge($CourtCase, $appointment);

        return collect($merg)->ToJson();
    }

    /** @test */
    public function test_get_appointment_data_to_dashboard()
    {

        $this->expectNotToPerformAssertions();
        $date = date('Y-m-d');
        if (isset($request->appoint_date) && !empty($request->appoint_date)) {
            $date = date('Y-m-d', strtotime(LogActivity::commonDateFromat($request->appoint_date)));
        }
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'date',
            2 => 'time',
        );

        $totalData = DB::table('appointments AS a')
            ->leftJoin('advocate_clients AS ac', 'ac.id', '=', 'a.client_id')
            ->select('a.id AS id', 'a.is_active AS status', 'a.mobile AS mobile', 'a.date AS date', 'a.time AS app_time', 'a.name AS name', 'a.name AS appointment_name', 'ac.first_name AS first_name', 'ac.last_name AS last_name', 'a.client_id AS client_id', 'a.type As type')
            ->whereDate('date', '>=', $date)
            ->whereDate('date', '<=', $date)
            ->count();
        $totalRec = $totalData;
        $terms = DB::table('appointments AS a')
            ->leftJoin('advocate_clients AS ac', 'ac.id', '=', 'a.client_id')
            ->select('a.id AS id', 'a.is_active AS status', 'a.mobile AS mobile', 'a.date AS date', 'a.time AS app_time', 'a.name AS name', 'a.name AS appointment_name', 'ac.first_name AS first_name', 'ac.last_name AS last_name', 'a.client_id AS client_id', 'a.type As type')
            ->whereDate('date', '>=', $date)
            ->whereDate('date', '<=', $date)
            ->get();

        $totalFiltered = $terms->count();
        $data = array();
        if (!empty($terms)) {

            foreach ($terms as $term) {

                $nestedData['id'] = $term->id;
                $nestedData['date'] = date(LogActivity::commonDateFromatType(), strtotime($term->date));
                $nestedData['time'] = date('g:i a', strtotime($term->app_time));
                $nestedData['mobile'] = $term->mobile;
                if ($term->type == "new") {
                    $nestedData['name'] = $term->appointment_name;
                } else {
                    $nestedData['name'] = $term->first_name . ' ' . $term->last_name;
                }
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
}
