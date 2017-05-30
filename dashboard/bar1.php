<section class="blog-post">
    <div class="panel panel-default">                                    
         <div class="panel-body jobad-bottomborder">
                <div><h4 class="text-info h4weight">Monthly Views</h4></div>
          </div>
 <style>
      .axis {
   font: 10px sans-serif;
 }

 .axis path,
 .axis line {
   fill: none;
   stroke: #000;
   shape-rendering: crispEdges;
 }

 </style>

<svg class="chart"></svg>
<script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script>    
        
<script>
    var data = [10,25,38,52,100];
    var width = 500;
    var height = 40;
    
    var heightScale = d3.scale.linear()
                    .domain([0,d3.max(data)])
                    .range([0,height]);
    
    var newScaledData = [];
    for (var i = 0; i < data.length; i++) {
      newScaledData[i] = heightScale(data[i]);
    }
    
    var yaxis = d3.svg.axis()
                .orient("left")
                .ticks(3)                
                .scale(heightScale);
    
    var canvas = d3.select("body")
                .append("svg")
                .attr("width", width)
                .attr("height", height)
                .append("g")
                .attr("transform", "translate(40,0)");
    
    var bars = canvas.selectAll("rect")
                .data(newScaledData)
                .enter()
                    .append("rect")
                    .attr("height", function(d){return d;})
                    .attr("width", 20)
                    .attr("x", function(d,i){ return i * 22;})
                    .attr("y", function(d) {
                                    return height - d;  //Height minus data value
                                });
    /*
    canvas.append("g")
            .attr("transform", "translate(0,0)")
            .call(yaxis);
    */    
</script>
     </div>
</section>