{extends 'layouts/base.tpl'}

{block "content"}
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Toetsen | Cijferreeks     </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> .CSV Importeren</a>
        </div>
        <form method="post">
            <input name="quizid" type="hidden" value="">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="1" name="num1">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="2" name="num2">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="3" name="num3">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="4" name="num4">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="5" name="num5">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="6" name="num6">
                    </div>
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" placeholder="??" name="correct_answer">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="8" name="option1">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="9" name="option2">
                </div>
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="10" name="option3">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <input type="text" class="form-control" placeholder="100" name="score">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Volgende</button>
        </form>
    </div>

{/block}