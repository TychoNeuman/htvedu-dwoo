{extends 'layouts/base.tpl'}

{block "content"}
<div class="container-fluid">
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <b>Slagingsperentage</b>
            <form method="post">
                {foreach $percentagesettings as setting}
                    <ul>
                        <li>{$setting.type_name}</li>
                        <input type="text" value="{$setting.percentage_low}" name="percentage-low-{$setting.id}">
                        <input type="text" value="{$setting.percentage_high}" name="percentage-high-{$setting.id}">
                    </ul>
                {/foreach}
                <input type="submit">
            </form>
        </div>
    </div>
</div>
{/block}