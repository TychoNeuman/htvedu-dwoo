{extends 'layouts/base.tpl'}

{block "content"}
<div class="container-fluid">
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <h6 class="m-0 font-weight-bold text-primary">Slagingspercentage</h6>
            <br />
            <form method="post">
                {foreach $percentagesettings as setting}
                    <span class="mb-1"><strong>{$setting.type_name}</strong></span>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" value="Onvoldoende" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" value="{$setting.percentage_low}" name="percentage-low-{$setting.id}" class="form-control">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" value="%" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" value="Goed" disabled>
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" value="{$setting.percentage_high}" name="percentage-high-{$setting.id}" class="form-control">
                        </div>
                        <div class="form-group col-md-1">
                            <input type="text" class="form-control" value="%" disabled>
                        </div>
                    </div>
                {/foreach}
                <input type="submit" class="btn btn-primary" value="Opslaan">
            </form>
        </div>
    </div>
</div>
{/block}