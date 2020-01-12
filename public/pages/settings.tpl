{extends 'layouts/base.tpl'}

{block "content"}
<div class="container-fluid">
    <div class="card shadow h-100 py-2">
        <div class="card-body">
            <b>Slagingsperentage</b>
            <form action="#" method="post">
                {foreach $percentagesettings as setting}
                    <ul>
                        <li>{$setting.type_name}</li>
                        <input type="text" value="{$setting.percentage}" name="percentage_{$setting.id}">
                    </ul>
                {/foreach}
                <input type="submit">
            </form>
        </div>
    </div>
</div>
{/block}