<?php

namespace App\Http\Controllers\String;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Person;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use App\Models\String\Export;
use App\Models\String\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        $devices = Device::all();
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.qr_code.search.create', compact('persons', 'devices', 'anbars', 'cells'));
    }

    public function search(Request $request)
    {
        $qr_code = QrCode::
        join('string_group_qr_codes', 'string_qr_codes.string_group_qr_code_id', 'string_group_qr_codes.id')
            ->where('serial', $request->search)->select('string_qr_codes.*')->first();
        if ($qr_code->string_group_qr_code->type != 'label')
            return ['status' => 'danger', 'message' => 'این کد qr به صورت وزنی ثبت شده است.امکان جستجو نیست.'];
        if (!$qr_code) {
            $if_exported = Export::where('serial', $request->search)->first();
            if ($if_exported) {
                if (!$if_exported->device || !$if_exported->person)
                    $desc = 'خروجی جهت صفر کردن سلول در تاریخ : ' . jdate($if_exported->created_at)->format('Y/m/d');
                else
                    $desc = "دستگاه " . $if_exported->device->name . " , شخص " . $if_exported->person->name . ", زمان خروج" . jdate($if_exported->created_at)->format('Y/m/d');
                return ['status' => 'danger', 'message' => " کد qr با مشخصه $desc خارج شده است "];
            }
            return ['status' => 'danger', 'message' => 'کد qr با این مشخصه یافت نشد.'];
        }

        $data['id'] = $qr_code->id;
        $data['cells'] = implode(',', $qr_code->string_cells()->get()->pluck('code')->toArray());
        $data['serial'] = $qr_code->serial;
        $data['material'] = $qr_code->string_group_qr_code->string_group->title;
        $data['weight'] = $qr_code->weight;
        return $data;
    }

//just export lable qr code not weight qr_cde
    public function export_cells(Request $request)
    {
        $qrCode = QrCode::find($request->id);
        if (!$qrCode->weight)
            return Response::error('کد qr  وزنی ندارد ابتدا وزن این کد را وارد نمایید.');
        elseif (!$qrCode->string_cells()->count())
            return Response::error('کد qr  هنوز وارد سلولی نشده امکان خروج نیست.');

        /*    if ($qrCode->weight > $request->weight || $total_weight > $request->weight)
                return ['status' => 'danger', 'message' => 'وزن خارج شده از وزن موجود بیشتر است'];*/
        $cells = $qrCode->string_cells()->get();
        $data_cells = implode(',', $qrCode->string_cells()->get()->pluck('code')->toArray());
        $qrCode->string_cells()->detach();
        $weight = $qrCode->weight;
        $qrCode->string_group_qr_code->string_exports()->create([
            'string_group_id' => $qrCode->string_group_qr_code->string_group->id,
            'device_id' => $request->device,
            'person_id' => $request->person,
            'company_id' => $request->company,
            'weight' => $weight,
            'serial' => $qrCode->serial,
            'string_cells' => $data_cells
        ]);

        $qrCode->delete();

        // search if cell is empty string_group_id=null
        foreach ($cells as $cell) {
            if (!$cell->string_qr_codes()->count())
                $cell->update(['string_group_id' => null]);
        }

        return Response::success();
    }

    public function enter_weight(Request $request)
    {
        $qrCode = QrCode::find($request->id);
        $qrCode->update(['weight' => $request->weight]);
        return Response::success();
    }

    public function enter_cells(Request $request)
    {
        $qrCode = QrCode::find($request->id);
        $string_group = $qrCode->string_group_qr_code->string_group;
        $cells = $request->cells;
        foreach ($cells as $cell) {
            $cc = Cell::find($cell);
            if ($cc->string_group_id != null && $cc->string_group_id !== $string_group->id)
                return Response::error('حاوی متریال متفاوتی است امکان اضافه کردن به این سلول وجود ندارد.' . $cc->code . 'سلول');
        }
        $prev_cells = $qrCode->string_cells()->get();
        $qrCode->string_cells()->sync($cells);

        foreach ($prev_cells as $cell) {
            if (!$cell->string_qr_codes()->count())
                $cell->update(['string_group_id' => null]);
        }

        foreach ($cells as $cell) {
            $cc = Cell::find($cell);
            $cc->update(['string_group_id' => $string_group->id]);
        }

        return Response::success();
    }
}
