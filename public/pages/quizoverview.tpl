{extends 'layouts/base.tpl'}

{block "content"}
<div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Toetsen | Overzicht</h1>
        </div>
        <div class="row">
{*        {% if quizes is empty %}*}
{*        <div class="col-sm-4" style="padding-bottom: 10px">*}
{*            <em>Geen toetsen gevonden...</em>*}
{*        </div>*}
{*        {% else %}*}
{*        {% for quiz in quizes %}*}
{*                <div class="col-sm-4" style="padding-bottom: 10px">*}
{*                    <div class="card">*}
{*                        <div class="card-body">*}
{*                            <h5 class="card-title">{{ quiz.getQuizName }}</h5>*}
{*                            <p class="card-text"><em>{{ quiz.getQuizType }}</em></p>*}
{*                            <p class="card-text"><strong>{{ quiz.getQuizScore }}</strong> punten - <strong>{{ quiz.getQuizTime }}</strong> minuten</p>*}
{*                            <a href="/quizpage/{{ quiz.getId }}" class="btn btn-primary">Bekijk</a>*}
{*                        </div>*}
{*                    </div>*}
{*                </div>*}
{*        {% endfor %}*}
{*        {% endif %}*}
        </div>
    </div>

{/block}