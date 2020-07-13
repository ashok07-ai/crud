<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Models\StudentInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\StudentInfoRepository;
use App\Http\Requests\StoreStudentInfoRequest;
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


    // For displaying all the datas together for database
    /**
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $studentInfos = StudentInfo::latest()->paginate(10);

        return view('student_infos.index')->with('studentInfos', $studentInfos);
    }


    // For creating the datas in database
    /**
     * @return Illuminate\Http\Response
     */
    public function create()
    {
        return view('student_infos.create');
    }

    // For Stroing the datas in database
    /**
     * @return Illuminate\Http\Response
     */
    public function store(CreateStudentInfoRequest $request)
    {
        StudentInfo::create($request->all());

        Flash::success('Student Information saved successfully.');

        return redirect(route('studentInfos.index'));
    }


    // For displaying the datas
    /**
     * Display the specified StudentInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show(StudentInfo $studentInfo)
    {

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        return view('student_infos.show')->with('studentInfo', $studentInfo);
    }

    /**
     * Show the form for editing the specified StudentInfo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        return view('student_infos.edit')->with('studentInfo', $studentInfo);
    }

    /**
     * Update the specified StudentInfo in storage.
     *
     * @param int $id
     * @param UpdateStudentInfoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStudentInfoRequest $request)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        $studentInfo = $this->studentInfoRepository->update($request->all(), $id);

        Flash::success('Student Info updated successfully.');

        return redirect(route('studentInfos.index'));
    }

    /**
     * Remove the specified StudentInfo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $studentInfo = $this->studentInfoRepository->find($id);

        if (empty($studentInfo)) {
            Flash::error('Student Info not found');

            return redirect(route('studentInfos.index'));
        }

        $this->studentInfoRepository->delete($id);

        Flash::success('Student Info deleted successfully.');

        return redirect(route('studentInfos.index'));
    }
}
