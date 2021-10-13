{include file="templates/header.tpl"}


    <main class="main-form">
        <div class="form-user-div">
            <form action="user/verifyLogin" method="POST">
                <h1>Ingresar</h1>

                <div class="form-group">
                    <label>Nombre de usuario:</label>
                    <input type="text" name="username">
                </div>

                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="password">
                </div>

                <button type="submit">Iniciar Sesión</button>
            </form>

        </div>

        {if $warning}
            <div class="warning-fail">
                <h2>{$warning}</h2>
            </div>
        {/if}
            
    </main>

{include file="templates/footer.tpl"}