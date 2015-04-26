$(document).ready(function(){

    require(["znd-graph", "lodash", "util", "znd-graph-navigation"], function(app, _, util, navig) {

        var containerSelector = "#graph",
            startWidth = $("#data").width() - 20;


  

        var preprocessInputs = function(data) {
            
            data.x = data.x.map(function(year) {
                return util.yearStart(year);
            });         

            data.timeline = data.timeline.map(function(series) {
            
                return series.map(function(position) {
                    position.ranges = _.map(position.ranges, function(range) {
                        return _.map(range, function(dateStr) {
                            return typeof dateStr === "string" ? new Date(Date.parse(dateStr)):null;
                        })
                    });
                    return position;
                });
            });
            
            return data;
        };

        var dataset = preprocessInputs({ 
            series: ["Plastika Nitra", "Prvá tunelárska", "Váhostav"],
            x: [2005, 2006, 2007, 2008, 2009, 2010, 2011] ,
            y: [[50, 10, 80], [60, 10, 30], [20, 70, 15], [50, 11, 26], [20, 15, 80], [150, 13, 3], [10, 60, 28]],
            timeline: [[
                { position: "Štatutár", ranges: [["2005-03-01", "2008-02-01"]] },
                { position: "Zástupca riaditeľa", ranges: [["2008-08-08", "2009-05-02"]] },
            ],[
                { position: "Štatutár", ranges: [["2005-02-03", "2007-09-27"], ["2009-12-12", "2010-01-01"]] },
                { position: "Zástupca riaditeľa", ranges: [["2005-06-01", "2008-11-18"]] }
            ],[
                { position: "Kotolník", ranges: [["2005-04-04", null]] },
            ]]
        });              

        
        var barGraphConfig = {
            width: startWidth, height: 400,
            segments: 5,
            container: d3.select(containerSelector + " .area")
        },  

        barGraphConfig2 = {
            width: 660, height: 400,
            segments: 4,
            container: d3.select(containerSelector + " .area")
        };

        
        var timelineConfig = {
            width: startWidth,
            segments: 5,
            itemHeight: 40,
            container: d3.select(containerSelector + " .timeline")
        };

        
        var horizontalBarChartConfig = {
            width: startWidth,
            barHeight: 30,
            container: d3.select(containerSelector + " .bar")
        };

        var configs = [horizontalBarChartConfig, timelineConfig, barGraphConfig];


        var navConfig = {
            container: d3.select(containerSelector),
            left: d3.select(containerSelector + " .pan.left"),
            right: d3.select(containerSelector + " .pan.right")
        };

        var horizontalBarChart = app.horizontalBarChart(horizontalBarChartConfig, dataset),
            barGraph = app.barGraph(barGraphConfig, dataset),
            timeline = app.timeline(timelineConfig, dataset);
        
        barGraph.reset();
        timeline.reset();
        horizontalBarChart.reset();

        navig.widget(navConfig, [barGraph, timeline]);


        //TODO: move this to the component, expose as an autoResize option
        $(window).resize(util.onResizeEnd(function() {
            var newWidth = $(containerSelector).width();
            
            _.each(configs, function(config) { config.width = newWidth; });

            
            barGraph.reset(null, barGraphConfig);
            timeline.reset(null, timelineConfig);
            horizontalBarChart.reset(null, horizontalBarChartConfig);
        }));

    });
        

});