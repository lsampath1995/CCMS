<?php

namespace Tests\Browser;

use App\Model\CaseType;
use App\Model\CourtType;
use App\Model\GeneralSettings;
use App\Model\InvoiceSetting;
use App\model\Mailsetup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Tests\DuskTestCase;

class SettingsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    /** @test
     * @throws \Throwable
     */
    public function test_case_status_create_view(): JsonResponse
    {
        $this->expectNotToPerformAssertions();
        return response()->json([
            'html' => view('admin.settings.case-status.case_status_create')->render()
        ]);
    }

    /** @test */
    public function test_case_type_view()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        return view('admin.settings.case-type.casetype');
    }

    /** @test
     * @throws \Throwable
     */
    public function test_create_case_type(): JsonResponse
    {
        $this->expectNotToPerformAssertions();
        $data['caseTypes'] = CaseType::where('parent_id', 0)
            ->orderBy('created_at', 'desc')->get();
        return response()->json([
            'html' => view('admin.settings.case-type.casetype_create', $data)->render()
        ]);
    }

    /** @test */
    public function test_court_view()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        return view('admin.settings.court.court');
    }

    /** @test
     * @throws \Throwable
     */
    public function test_create_court(): JsonResponse
    {
        $this->expectNotToPerformAssertions();
        $date['court_types'] = CourtType::orderBy('created_at', 'desc')->get();
        return response()->json([
            'html' => view('admin.settings.court.court_create', $date)->render()
        ]);
    }

    /** @test */
    public function test_view_court_type()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        return view('admin.settings.court-type.court_type');
    }

    /** @test
     * @throws \Throwable
     */
    public function test_view_create_court_type(): \Illuminate\Http\JsonResponse
    {
        $this->expectNotToPerformAssertions();
        return response()->json([
            'html' => view('admin.settings.court-type.caset_type_create')->render()
        ]);
    }

    /** @test */
    public function test_view_database_backup()
    {
        $this->expectNotToPerformAssertions();
        return view('admin.settings.database-backup.database_backup');
    }

    /** @test */
    public function test_database_backup_restore(): RedirectResponse
    {
        $this->expectNotToPerformAssertions();
        $server_name = env("DB_HOST");
        $username = env("DB_DATABASE");
        $password = env("DB_USERNAME");
        $database_name = env("DB_PASSWORD");

        Session::flash('success', "Backup Restore Successfully");
        return redirect()->back();
    }

    /** @test */
    public function test_general_settings()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        $this->data['timezone'] = DB::table('zone')->get();
        $GeneralSettings = GeneralSettings::findOrfail(1);
        $this->data['title'] = 'Mail Setup';
        $this->data['GeneralSettings'] = $GeneralSettings;
        $this->data['countrys'] = DB::table('countries')->get();
        $this->data['states'] = DB::table('states')->where('country_id', $GeneralSettings->country)->get();
        $this->data['citys'] = DB::table('cities')->where('state_id', $GeneralSettings->state)->get();
        return view('admin.settings.general_setting', $this->data);
    }

    /** @test */
    public function test_general_settings_date()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        $this->data['timezone'] = DB::table('zone')->get();
        $GeneralSettings = GeneralSettings::findOrfail(1);
        $this->data['title'] = 'Mail Setup';
        $this->data['GeneralSettings'] = $GeneralSettings;
        $this->data['countrys'] = DB::table('countries')->get();
        $this->data['states'] = DB::table('states')->where('country_id', $GeneralSettings->country)->get();
        $this->data['citys'] = DB::table('cities')->where('state_id', $GeneralSettings->state)->get();
        return view('admin.settings.general_setting_date', $this->data);
    }

    /** @test */
    public function test_invoice_settings_view()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        $data['setting'] = InvoiceSetting::find(1);
        return view('admin.settings.invoice-setting.invoice_edit', $data);
    }

    /** @test */
    public function test_judge_list_view()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        return view('admin.settings.judge.judge');
    }

    /** @test */
    public function test_judge_create_view(): JsonResponse
    {
        $this->expectNotToPerformAssertions();
        return response()->json([
            'html' => view('admin.settings.judge.judge_create')->render()
        ]);
    }

    /** @test */
    public function test_smtp_mail_setup()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();

        $mailsetup = Mailsetup::findOrfail(1);
        $this->data['title'] = 'Mail Setup';
        $this->data['mailsetup'] = $mailsetup;
        return view('admin.settings.mail_setup', $this->data);
    }

    /** @test */
    public function test_tax_settings_view()
    {
        $this->expectNotToPerformAssertions();
        $user = \Auth::guard('admin')->user();
        return view('admin.settings.tax.tax');
    }

    /** @test
     * @throws \Throwable
     */
    public function test_create_tax_view(): JsonResponse
    {
        $this->expectNotToPerformAssertions();
        return response()->json([
            'html' => view('admin.settings.tax.tax_create')->render()
        ]);
    }
    /** @test */


}
