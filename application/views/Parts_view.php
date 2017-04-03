<div class="row">
    <div class="row row-eq-height">
        {parts}
        <div class="col-xs-6 col-sm-3 col-lg-2">
            <div class="col-xs-12">
                <a href="{ahref}"><img class='img-responsive' src="/images/parts/{image}" title="Line: {line} - Model: {part_code}"/></a>
            </div>
            <div class="col-xs-12">
                <dt class="col-xs-5">Line:</dt>
                <dd class="col-xs-7">{line}</dd>
                <dt class="col-xs-5">Model:</dt>
                <dd class="col-xs-7">{part_code}</dd>
            </div>
        </div>
        {/parts}
    </div>
    <div class="row">
    <form action="/Parts_controller/buildparts" method="POST">
        <input type="submit" value="Build Parts">
    </form>
    <form action="/Parts_controller/buybox" method="POST">
        <input type="submit" value="Buy Box">
    </form>
    </div>
</div>