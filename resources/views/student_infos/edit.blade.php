@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Student Info
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($studentInfo, ['route' => ['studentInfos.update', $studentInfo->id], 'method' => 'patch']) !!}

                        @include('student_infos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection