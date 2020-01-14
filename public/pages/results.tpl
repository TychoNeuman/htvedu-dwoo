{extends 'layouts/base.tpl'}

{block "content"}

    <div class="container-fluid">
        <div class="d-flex bd-highlight">
        <!-- Project Card Example -->
        <div class="card shadow flex-fill m-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Per Student</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Toets Gemaakt <span class="float-right">{$amount_of_taken_quizes}</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: {$percentageMadeQuiz}%" aria-valuenow="{$amount_of_taken_quizes}" aria-valuemin="0" aria-valuemax="{$amount_of_taken_quizes + $amount_of_not_taken_quiz}"></div>
                </div>
                <h4 class="small font-weight-bold">Geen Toets Gemaakt<span class="float-right">{$amount_of_not_taken_quiz}</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {$percentageNotMadeQuiz}%" aria-valuenow="{$amount_of_not_taken_quiz}" aria-valuemin="0" aria-valuemax="{$amount_of_taken_quizes + $amount_of_not_taken_quiz}"></div>
                </div>
            </div>
            <div class="card-header py-3">
                <a href="index.php?p=results-per-student"><h6 class="m-0 font-weight-bold text-primary">Bekijk Details</h6></a>
            </div>
        </div>

        <!-- Project Card Example -->
        <div class="card shadow flex-fill m-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Per Toets</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bekijk Details</h6>
            </div>
        </div>
        </div>
    </div>

{/block}