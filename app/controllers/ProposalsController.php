<?php

namespace app\controllers;

use app\core\request\Request;
use app\models\Plans;
use app\models\Prices;
use app\models\Proposals;

class ProposalsController
{
    public function index()
    {
        $proposals = Proposals::query()->get();

        return view('proposals.index', compact('proposals'));
    }

    public function create()
    {
        $plans = Plans::query()->pluck('nome', 'codigo');

        return view('proposals.form', compact('plans'));
    }

    public function store(Request $request)
    {
        $plans = Plans::query()->find('codigo', $request->get('codigo_plano'));

        $prices_plan = Prices::query()->find('codigo', $request->get('codigo_plano'));

        $prepare_proposal = Proposals::prepare($plans, $prices_plan, $request->all());

        Proposals::query()->insertOrUpdate($prepare_proposal);

        return redirect('/proposals/index');
    }
}