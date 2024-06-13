<?php

namespace App\Http\Controllers;

use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;
use App\Models\SubjectModel;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list' , $data);
    }

    public function add()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Add New List";
        return view('admin.subject.add' , $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $user = new SubjectModel;
        $user->name = trim($request->name);
        $user->type = trim($request->type);
        $user->status = trim($request->status);
        $user->code  = trim($request->code);
        $user->unit = trim($request->unit);
        $user->created_by = Auth::user()->id;
        $user->save();

        return redirect('/admin/subject/list')->with('success','Subject Successfully Created');
    }
    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit',$data);
        }
        else{
            abort(404);
        }
    }

    public function update($id,Request $request)
    {
        $save = SubjectModel::getsingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->code  = trim($request->code);
        $save->unit = trim($request->unit);
        $save->save();

        return redirect('admin/subject/list')->with('success','Subject Successfully updated');

    }

    public function delete($id)
    {
        $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success','Subject Successfully Deleted');
    }

    //student part

    public function MySubject()
    {
        // dd(Auth::user()->class_id);
        $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
        $data['header_title'] = "My Subject";
        return view('student.my_subject' , $data);
    }
}
