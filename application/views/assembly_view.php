<h1>Assembly Page</h1>

<div id="body">
     <!-- Nav tabs -->
    <ul id="myTabs" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a data-toggle="tab" href="#parts">Parts</a></li>
        <li role="presentation"><a data-toggle="tab" href="#robots">Robots</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        
        <!--Parts Tab-->
        <div role="tabpanel" class="tab-pane fade in active" id="parts">
            <h2>Parts</h2>
            <div class="row" style="width:100%">
                <div class="col-xs-3">
                    <h3>Top</h3>
                    {top_parts}
                    <div>
                        <input type="checkbox" name="{part_code}" value="{part_code}">
                        <img class="asmImage" src="/images/parts/{image}" title="{part_code}"/>
                    </div>
                    {/top_parts}
                </div>
                <div class="col-xs-3">
                    <h3>Torso</h3>
                    {torso_parts}
                    <div>
                        <input type="checkbox" name="{part_code}" value="{part_code}">
                        <img class="asmImage" src="/images/parts/{image}" title="{part_code}"/>
                    </div>                    
                    {/torso_parts}
                </div>
                <div class="col-xs-3">
                    <h3>bottom</h3>
                    {bottom_parts}
                    <div>
                        <input type="checkbox" name="{part_code}" value="{part_code}">
                        <img class="asmImage" src="/images/parts/{image}" title="{part_code}"/>
                    </div>                      
                    {/bottom_parts}
                </div>
                <div class="col-xs-3">
                    <div class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
                        <button class="btn btn-default">Build Robot</button>
                        <button class="btn btn-danger">Return to head Office</button>
                      </div>
                </div>
            </div>
        </div>
        
        <!--Robots Tab-->
        <div role="tabpanel" class="tab-pane fade" id="robots">
            <h2>Robots</h2>

            {robots}
            <div class="row">
                <form class="col-xs-1">
                    <input type="checkbox" name="{id}" value="{id}">
                </form>

                <div class="col-xs-4">
                    <img class="asmImage" src="/images/parts/{topImage}" title="top"/>
                    <img class="asmImage" src="/images/parts/{torsoImage}" title="torso"/>
                    <img class="asmImage" src="/images/parts/{bottomImage}" title="bottom"/>
                </div>
                <div class="col-xs-5">
                    <p>ID: {id}</p>
                    <p>Top: {top}</p>
                    <p>Torso: {torso}</p>
                    <p>Torso: {bottom}</p>
                </div>
            </div>
            {/robots}
            
            <div>
                <button class="btn btn-default">Ship to Head Office</button>
            </div>
        </div>
    </div>
</div>

