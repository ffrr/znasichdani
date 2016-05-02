require(["znd-graph-core", "znd-graph-navigation", "znd-graph-controls", "znd-graph-filtering",
    "znd-graph-config", "znd-graph-layout", "znd-graph-colors", "znd-graph-testdata", "lodash", "util",
    "jquery", "d3", "domready"
  ],

  function(app, navig, controls, filter, globalConfig, layout, colors, testdata, _, util, $, d3, domready) {
    "use strict";


    var enlargeContainerToVisibleParent = function(containerSelector) {
      var container = $(containerSelector), parentWidth = container.parents("section").width();
      if(parentWidth) container.width(parentWidth);
    }, sizeTheContainerBack = function(containerSelector) {
      $(containerSelector).width("100%");
    };

    domready(function() {
      var containerSelector = "#graph",
        data = testdata,
        segments = 5,
        initialWidth = $(containerSelector).width() - 15,
        groupingThreshold = 1;


      enlargeContainerToVisibleParent(containerSelector);

      var navigationState = navig.state(data.x.length, segments, 1);
        globalConfig.groupingThreshold = groupingThreshold || 1;

      var chartConfigs = {

        pie: {
          barHeight: 30,
          container: d3.select(containerSelector + " .bar")
        },

        bar: {
          height: 400,
          container: d3.select(containerSelector + " .area"),
          max: util.detectMaximum(data) * 1.6
        },

        timeline: {
          itemHeight: 50,
          container: d3.select(containerSelector + " .timeline")
        }
      };

      var navConfig = {
        container: $(".navigable")
      };

      colors.init(data.series);

      var componentDefinitions = _.indexBy(_.map(app, function(chart, chartName) {

        var config = chartConfigs[chartName];

        _.assign(config, {
          width: initialWidth,
          segments: segments,
          navig: navigationState
        });

        chart = chart(config, data);

        return {
          component: chart,
          config: config,
          name: chartName
        };
      }), 'name');

      var charts = _.pluck(_.values(componentDefinitions), 'component');

      // init controls
      var ctrl = controls({
        container: $("#pie")
      });

      //init filtering
      filter(data, ctrl, charts, true);

      //init navigation
      var navigation = navig.widget(navConfig, data, navigationState, charts);

      // add navi to components
      componentDefinitions["nav"] = {
        component: navigation,
        config: navConfig,
        name: "nav"
      };

      // start the layout watch and kick it off

      layout.enable($(containerSelector), componentDefinitions);
      layout.start();
      sizeTheContainerBack(containerSelector);
    });


  });