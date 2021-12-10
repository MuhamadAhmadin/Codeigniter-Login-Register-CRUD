<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Freelancer;
use App\Models\Event;
use App\Models\Skill;
use App\Models\Company;
use App\Models\Loker;

class PageController extends BaseController
{
    public function index()
    {
        $company = new Company();
        $event = new Event();
        $loker = new Loker();
        $skill = new Skill();
        $freelancer = new Freelancer();
        $user = new User();
        $data['jumlah_user'] = $user->countAll();
        $data['jumlah_freelancer'] = $freelancer->countAll();
        $data['jumlah_event'] = $event->countAll();
        $data['jumlah_loker'] = $loker->countAll();
        $data['jumlah_skill'] = $skill->countAll();
        $data['jumlah_company'] = $company->countAll();
        return view('dashboard/index', $data);
    }
}
