<p>{$_lang['mdwp.shortcuts.intro']}</p>
<br/>
<div class="table-wrapper">
    <table class="table">
        <thead>
        <tr>
            <th>{$_lang['mdwp.shortcuts.description']}</th>
            <th>{$_lang['mdwp.shortcuts.shortcut']}</th>
        </tr>
        </thead>
        <tbody>
        {foreach $shortcuts as $shortcut}
            <tr>
                <td>{$shortcut['description']}</td>
                <td>{$shortcut['shortcut']}</td>
            </tr>
        {/foreach}
        </tbody>
    </table>
</div>