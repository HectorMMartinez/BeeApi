<?php
require("../libreria/motor.php");
plantilla::aplicar();
$n=4;
$api=(object)get_api($n);
if(!$api){
    echo '
    <h1>API no encontrada</h1>
    <p>La API que buscas no existe</p>
    <a href="./" class="button">Regresar</a>
    ';
    exit();
}
?>
<h1 class="title"> <?php echo $api->nombre; ?> </h1>
<p class="subtitle"> <?php echo $api->descripcion;?></p>
<div class="content columns">
    <form class="column is-4" method="post" action="Eje_4/Resultado.php" target="resultado">
        <div class="field">
            <label class="label" for> Unidad: </label>
            <div class="control ">
                <div class="select">
                    <select name="unidad">
                        <option value="Standard">Standard °K</option>
                        <option value="Metric">Metrico °C</option>
                        <option value="Imperial">Imperial °F</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary">Enviar</button>
            </div>
        </div>
    </form>
</div>
<iframe id="resultadoFrame" name="resultado" style="width:100%; border:none; overflow:hidden; display:block;"></iframe>
<script>
    function ajustarAlturaIframe() {
        var iframe = document.getElementById("resultadoFrame");
        if (iframe && iframe.contentWindow.document.documentElement) {
            iframe.style.height = iframe.contentWindow.document.documentElement.scrollHeight + "px";
            iframe.style.overflow = "hidden";
        }
    }

    document.getElementById("resultadoFrame").onload = function () {
        setTimeout(ajustarAlturaIframe, 100);
    };
</script>

