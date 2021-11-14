{include file="templates/header.tpl"}



    <main class="main-list">

        {include file="templates/formPublic.tpl"}

        {if !empty($bands)}
            <table class="elem-table">
                <thead>
                    <tr>
                        <td>Banda</td>
                        <td>Debut de banda</td>
                        <td>Álbumes lanzados</td>
                        <td>Miembros</td>
                    </tr>
                </thead>

                <tbody>
                    {foreach from=$bands item=$band}
                        <tr>
                            <td>{$band->band_name}</td>
                            <td>{$band->debut}</td>
                            <td>{$band->albums_released}</td>
                            <td>{$band->band_members}</td>
                        </tr>                   
                    {/foreach}
                </tbody>
            </table>
        {else}
            <div class="warning-fail">
                <h2>No hay datos</h2>
            </div>
        {/if}    

    </main>

{include file="templates/footer.tpl"}