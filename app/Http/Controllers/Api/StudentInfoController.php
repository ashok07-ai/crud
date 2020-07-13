<?php

namespace App\Http\Controllers\Api;

use Flash;
use Response;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\StudentInfoResource;
use App\Repositories\StudentInfoRepository;
use App\Http\Requests\CreateStudentInfoRequest;
use App\Http\Requests\UpdateStudentInfoRequest;

class StudentInfoController extends AppBaseController
{
    /** @var  StudentInfoRepository */
    private $studentInfoRepository;

    public function __construct(StudentInfoRepository $studentInfoRepo)
    {
        $this->studentInfoRepository = $studentInfoRepo;
    }

    
    // For show all the datas
    public function index(): StudentInfoResource
    {
        return new StudentInfoResource(StudentInfo::paginate());
    }



    
    //For Storing the datas
    public function store(Request $request)
    {

        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'phone'         => 'required',
            'address'       => 'required',
            'description'   => 'required',
        ]);

        $student_infos = StudentInfo::create($request->all());
        return new StudentInfoResource($student_infos);
    }

    
    // For showing the datas with respect to id
    public function show(StudentInfo $studentInfo): StudentInfoResource
    {
        return new StudentInfoResource($studentInfo);
    }

    
    // For updating the datas
    public function update(StudentInfo $studentInfo, Request $request): StudentInfoResource
    {
        $studentInfo->update($request->all());
        return new StudentInfoResource($studentInfo);
    }

    // For deleting the datas
    public function destroy(StudentInfo $studentInfo)
    {
        $studentInfo->delete();
        return response()->json();
    }
}
