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
            <div class="row">
                <form action="assembly/submit"  method="post">
                <div class="col-xs-3">
                    <h3>Top</h3>
                    {top_parts}
                    <div>
                        <input type="checkbox" name="1[]" value="{certificate}"/>
                        <img class="asmImage" src="/images/parts/{image}" title="{certificate}"/>
                    </div>
                    {/top_parts}
                </div>
                <div class="col-xs-3">
                    <h3>Torso</h3>
                    {torso_parts}
                    <div>
                        <input type="checkbox" name="2[]" value="{certificate}"/>
                        <img class="asmImage" src="/images/parts/{image}" title="{certificate}"/>
                    </div>                    
                    {/torso_parts}
                </div>
                <div class="col-xs-3">
                    <h3>bottom</h3>
                    {bottom_parts}
                    <div>
                        <input type="checkbox" name="3[]" value="{certificate}"/>
                        <img class="asmImage" src="/images/parts/{image}" title="{certificate}"/>
                    </div>                      
                    {/bottom_parts}
                </div>
                <div class="col-xs-3">
                    <div class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
                        <button type="submit" name="action" class="btn btn-default" value="Assemble">Assemble it</button>
                        <button type="submit" name="action" class="btn btn-danger" value="Return">Return to head office</button>
                      </div>
                </div>
                </form>

            </div>
        </div>
        
        <!--Robots Tab-->
        <div role="tabpanel" class="tab-pane fade" id="robots">
            <h2>Robots</h2>
            
            <form action="assembly/ship"  method="post">
            {robots}
            <div class="row">
                
                <div class="col-xs-2">
                    <input type="radio" name="robot" value="{id}" required>
                </div>

                <div class="col-xs-6">
                    <img class="asmImage" src="/images/parts/{headImage}" title="top"/>
                    <img class="asmImage" src="/images/parts/{torsoImage}" title="torso"/>
                    <img class="asmImage" src="/images/parts/{legsImage}" title="legs"/>
                </div>
                <div class="col-xs-4">
                    <p>ID: {id}</p>
                    <p>Top: {head}</p>
                    <p>Torso: {torso}</p>
                    <p>Bottom: {legs}</p>
                    <p>Built: {built}</p>
                </div>
               
            </div>
            {/robots}
            <div>
                <button type="submit" name="ship" class="btn btn-default" value="ship">Ship to Head Office</button>
            </div>
            </form>

        </div>
    </div>
</div>

