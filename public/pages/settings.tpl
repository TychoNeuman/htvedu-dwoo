{extends 'layouts/base.tpl'}

{block "content"}
<div class="container-fluid">
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <b>Slagingsperentage</b>
            <form method="post">
                {foreach $percentagesettings as setting}
                    <div class="form-row">
                        {$setting.type_name}
                        <input type="text" value="{$setting.percentage_low}" name="percentage-low-{$setting.id}" class="form-control">
                        <input type="text" value="{$setting.percentage_high}" name="percentage-high-{$setting.id}" class="form-control">
                    </div>
                {/foreach}
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
{/block}