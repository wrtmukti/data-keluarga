<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeopleController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function people()
    {
        $peoples = People::all();
        $query = '';
        $question = '';
        return view('people.index', compact('peoples', 'query', 'question'));
    }
    public function create()
    {

        $peoples = People::all();
        return view('people.create', compact('peoples'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required',
        ]);

        People::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->to('/people')->with('success', 'Data baru berhasil ditambahkan :)');
    }

    public function show($id)
    {
        $people = People::findOrFail($id);
        $parent = People::where('id', $people->parent_id)->first();
        // dd($people->parent_id);
        return view('people.show', compact('people', 'parent'));
    }

    public function edit($id)
    {
        $people = People::findOrFail($id);
        $peoples = People::all();
        return view('people.edit', compact('people', 'peoples'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
        ]);
        // dd($id);

        $dataToUpdate = [
            'name' => $request->name,
            'gender' => $request->gender,
            'parent_id' => $request->parent_id,
        ];
        DB::table('people')->where('id', $id)->update($dataToUpdate);

        return redirect('/people')->with('status', 'berhasil update data!');
    }
    public function destroy($id)
    {
        // dd($id);
        People::destroy($id);
        return redirect()->to('/people')->with('danger', 'data dihapus:(');
    }

    public function query(Request $request)
    {
        // dd($request['query']);
        switch ($request['query']) {
            case '1':
                $question = 'Buat query untuk mendapatkan semua anak Budi !';
                $query = People::where('parent_id', 1)->get();
                break;
            case '2':
                $question = 'Buat query untuk mendapatkan cucu dari budi !';
                $query = People::where('parent_id', '!=',  1)->get();
                break;
            case '3':
                $question = 'Buat query untuk mendapatkan cucu perempuan dari budi !';
                $query = People::where('parent_id', '!=',  1)->where('gender', 'female')->get();
                break;
            case '4':
                $question = 'Buat query untuk mendapatkan bibi dari Farah !';
                $query = People::where('parent_id', 1)->where('gender', 'female')->get();
                break;
            case '5':
                $question = 'Buat query untuk mendapatkan sepupu laki-laki dari Hani !';
                $query = People::where('parent_id', '!=',  1)->where('gender', 'male')->get();
                break;
            default:
                $question = 'Anda belum memilih Query !';
                $query = '';
                break;
        }
        $peoples = People::all();
        return view('people.index', compact('query', 'peoples', 'question'))->with('success', 'Query Berhasil :)');
    }
}
