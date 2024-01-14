<?php

namespace App\Http\Controllers\String;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\String\Cell;
use App\Models\Device;
use App\Models\Person;
use App\Models\String\Anbar;
use App\Models\String\Color;
use App\Models\String\Export;
use App\Models\String\Grade;
use App\Models\String\GroupQrCode;
use App\Models\String\Layer;
use App\Models\String\Material;
use App\Models\String\QrCode;
use App\Models\String\QrCodeCell;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        $colors = Color::all();
        $materials = Material::all();
        $grades = Grade::all();
        $layers = Layer::all();
        $sellers = Seller::all();
        return view('string.export.index', compact('anbars', 'layers', 'cells', 'colors', 'materials',
            'grades', 'sellers'));

    }

    public function search(Request $request)
    {
        $items = QrCodeCell::where('string_cell_id', $request->string_cell_id)
            ->join('string_qr_codes', 'string_qr_code_cell.string_qr_code_id', 'string_qr_codes.id')
            ->join('string_group_qr_codes', 'string_qr_codes.string_group_qr_code_id', 'string_group_qr_codes.id')
            ->where('string_group_qr_codes.type', '!=', 'label')->get();
        /* if (isset($request->string_material_id)) {
             $query->where('string_groups.string_material_id', $request->string_material_id);
             $title[] = ' جنس:' . Material::find($request->string_material_id)->name;

         }
         if (isset($request->string_color_id)) {
             $query->where('string_groups.string_color_id', $request->string_color_id);
             $title[] = ' رنگ:' . Color::find($request->string_color_id)->name;

         }
         if (isset($request->string_grade_id)) {
             $query->where('string_groups.string_grade_id', $request->string_grade_id);
             $title[] = ' نمره:' . Grade::find($request->string_grade_id)->value;
         }

         if (isset($request->string_layer_id)) {
             $query->where('string_groups.string_layer_id', $request->string_layer_id);
             $title[] = ' لا :' . Layer::find($request->string_layer_id)->value;
         }*/
        $devices = Device::all();
        $persons = Person::all();
        return view('string.export.search', compact('items', 'devices', 'persons'));
    }

    // in export with weight we have total weight in weight but in qr_code we dont have
    public function export(Request $request)
    {
        $item = GroupQrCode::find($request->id);
        $qrCode = $item->string_qr_codes()->first();
        if ($request->weight > $qrCode->weight)
            return Response::error('مقدار وزن وارد شده از وزن موجود بیشتر است.');
        $item->string_exports()->create([
            'string_group_id' => $item->string_group_id,
            'device_id' => $request->device,
            'person_id' => $request->person,
            'weight' => $request->weight,
            'serial' => $qrCode->serial,
        ]);

        $new_wight = $qrCode->weight - $request->weight;
        if ($new_wight == 0) {
            $cells = $qrCode->string_cells()->get();
            $qrCode->string_cells()->detach();
            foreach ($cells as $cell) {
                if (!$cell->string_qr_codes()->count())
                    $cell->update(['string_group_id' => null]);
            }
            $qrCode->delete();
        }
        $qrCode->update(['weight' => $new_wight]);

        return Response::success();
    }

    public function export_multi_qr_codes()
    {
        $persons = Person::all();
        $devices = Device::all();
        return view('string.export.multi_qr_codes.index', compact('persons', 'devices'));
    }

    public function search_multi_qr_codes(Request $request)
    {
        $qr_code = QrCode::
        join('string_group_qr_codes', 'string_qr_codes.string_group_qr_code_id', 'string_group_qr_codes.id')
            ->where('serial', $request->search)->where('type', 'label')->select('string_qr_codes.*')->first();
        if (!$qr_code) {
            $if_exported = Export::where('serial', $request->search)->first();
            if ($if_exported) {
                $desc = "دستگاه " . $if_exported->device->name . " , شخص " . $if_exported->person->name . ", زمان خروج" . jdate($if_exported->created_at)->format('Y/m/d');
                return Response::error(" کد qr با مشخصه $desc خارج شده است ");
            } else
                return Response::error('کد qr با این مشخصه یافت نشد.');
        }
        if (!$qr_code->weight)
            return Response::error('کد qr  وزنی ندارد ابتدا وزن این کد را وارد نمایید.');
        elseif (!$qr_code->string_cells()->count())
            return Response::error('کد qr  هنوز وارد سلولی نشده امکان خروج نیست.');
        $data['id'] = $qr_code->id;
        $data['cells'] = implode(',', $qr_code->string_cells()->get()->pluck('code')->toArray());
        $data['serial'] = $qr_code->serial;
        $data['material'] = $qr_code->string_group_qr_code->string_group->title;
        $data['weight'] = $qr_code->weight;

        /*********************************/
        $cells = $qr_code->string_cells()->get()->pluck('id')->toArray();
        $qr_code->string_cells()->detach();
        $qr_code->delete();
        $qr_code->string_group_qr_code->string_exports()->create([
            'string_group_id' => $qr_code->string_group_qr_code->string_group->id,
            'device_id' => $request->device,
            'person_id' => $request->person,
            'weight' => $qr_code->weight,
            'serial' => $qr_code->serial,
        ]);
        $cells = array_unique($cells);
        foreach ($cells as $cell) {
            $cell = Cell::find($cell);
            if (!$cell->string_qr_codes()->count())
                $cell->update(['string_group_id' => null]);
        }
        return $data;
        /*********************************/

    }

/*    public function export_multi_qr_codes_save(Request $request)
    {
        $cells = [];
        if (isset($request->qr_codes)) {
            foreach ($request->qr_codes as $qr_code) {
                $qrCode = QrCode::find($qr_code);
                array_push($cells, ...$qrCode->string_cells()->get()->pluck('id')->toArray());
                $qrCode->string_cells()->detach();
                $qrCode->delete();
                $qrCode->string_group_qr_code->string_exports()->create([
                    'string_group_id' => $qrCode->string_group_qr_code->string_group->id,
                    'device_id' => $request->device,
                    'person_id' => $request->person,
                    'weight' => $qrCode->weight,
                    'serial' => $qrCode->serial,
                ]);
            }
            $cells = array_unique($cells);
            foreach ($cells as $cell) {
                $cell = Cell::find($cell);
                if (!$cell->string_qr_codes()->count())
                    $cell->update(['string_group_id' => null]);
            }
            return redirect()->back()->with('success', 'عملیات با موفقیت انجام شد.');
        }
        return redirect()->back()->withErrors('کد qr وارد نشده است.');
    }*/

}
