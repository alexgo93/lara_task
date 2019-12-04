<?php

namespace App\Http\Controllers;

use App\FeedbackInfromation;
use Illuminate\Http\Request;

class FeedbackInformationController extends Controller
{
    private $feedbackInformation;

    public function __construct(FeedbackInfromation $feedbackInfromation)
    {
        $this->feedbackInformation = $feedbackInfromation;
    }

    public function showLog($feedbackId)
    {
        $logs = $this->feedbackInformation->getLogs($feedbackId);
        return view('feedback-info.info')->with('logs', $logs);
    }
}
