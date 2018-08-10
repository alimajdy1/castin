<?php

namespace App\Http\Controllers\Client;

use App\Constant;
use App\Http\Requests\Client\JobRequest;
use App\Http\Requests\Client\UpdateJobRequest;
use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function create()
    {
        $data['user'] = Auth::user();
        $data['hair_colors'] = Constant::getConstants('hair_color')->childrens;
        $data['hair_styles'] = Constant::getConstants('hair_style')->childrens;
        $data['eyes_colors'] = Constant::getConstants('eyes_color')->childrens;
        $data['skin_colors'] = Constant::getConstants('skin_color')->childrens;
        $data['hair_cuts'] = Constant::getConstants('hair_cut')->childrens;
        return view('client.job.create', $data);
    }

    public function search()
    {
        return view('client.job.research');
    }

    public function edit(Job $job)
    {
        $data['job'] = $job;
        $data['hair_colors'] = Constant::getConstants('hair_color')->childrens;
        $data['hair_styles'] = Constant::getConstants('hair_style')->childrens;
        $data['eyes_colors'] = Constant::getConstants('eyes_color')->childrens;
        $data['skin_colors'] = Constant::getConstants('skin_color')->childrens;
        $data['hair_cuts'] = Constant::getConstants('hair_cut')->childrens;
        return view('client.job.edit', $data);
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());
        return redirect()->route('dashboard.client.profile.index');
    }

    public function store(JobRequest $request)
    {
        $request['need_date'] = Carbon::parse($request['need_date'])->format('Y-m-d');
        $request['user_id'] = auth()->user()->id;
        Job::create($request->all());
        return redirect()->route('dashboard.client.profile.index');
    }

    public function destroy(Job $job){
        $job->delete();
        return response()->json(['status'=>true]);
    }
}
