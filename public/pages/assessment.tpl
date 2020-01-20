{extends 'layouts/base.tpl'}

{block "content"}
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sport</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <a href="index.php?p=assessment-users&subject=sport"><button type="button" class="btn btn-outline-primary btn-sm">Beoordelen</button></a>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Werkstuk</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <a href="index.php?p=assessment-users&subject=assignment"><button type="button" class="btn btn-outline-primary btn-sm">Beoordelen</button></a>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Groepsopdracht</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <a href="index.php?p=assessment-users&subject=group"><button type="button" class="btn btn-outline-primary btn-sm">Beoordelen</button></a>
            </div>
        </div>
    </div>

{/block}