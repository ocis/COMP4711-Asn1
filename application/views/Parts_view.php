<div class="row">
    <div class="row">
        {parts}
        <div class="col-xs-6 col-sm-4 col-lg-2">
            <a href="{ahref}"><img class='partspix' src="/images/parts/{image}" title="{part_code}"/></a>
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