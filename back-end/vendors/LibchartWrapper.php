<?php
/*
    File        : LibchartWrapper.php

    Author      : Gabriel Nicolás González Ferreira
    
    License     : http://www.gnu.org/licenses/gpl.txt GNU GPL 3.0
    
    IDE         : Sublime Text 2.02
*/
    require_once 'back-end/vendors/libchart/libchart/classes/model/ChartConfig.php';
    require_once 'back-end/vendors/libchart/libchart/classes/model/Point.php';
    require_once 'back-end/vendors/libchart/libchart/classes/model/DataSet.php';
    require_once 'back-end/vendors/libchart/libchart/classes/model/XYDataSet.php';
    require_once 'back-end/vendors/libchart/libchart/classes/model/XYSeriesDataSet.php';
    
    require_once 'back-end/vendors/libchart/libchart/classes/view/primitive/Padding.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/primitive/Rectangle.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/primitive/Primitive.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/text/Text.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/color/Color.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/color/ColorSet.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/color/Palette.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/axis/Bound.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/axis/Axis.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/plot/Plot.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/caption/Caption.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/chart/Chart.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/chart/BarChart.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/chart/VerticalBarChart.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/chart/HorizontalBarChart.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/chart/LineChart.php';
    require_once 'back-end/vendors/libchart/libchart/classes/view/chart/PieChart.php';

class LibchartWrapper
{
    public function __construct()
    {

    }

    public function __destruct()
    {

    }

    public function createChartConfig()
    {
        return new ChartConfig;
    }    

    public function createPoint($uno, $dos)
    {
        return new Point($uno, $dos);
    }

    public function createDataSet()
    {
        return new DataSet;
    }

    public function createXYDataSet()
    {
        return new XYDataSet;
    }
    
    public function createXYSeriesDataSet()
    {
        return new XYSeriesDataSet;
    }
    
    public function createPadding()
    {
        return new Padding;
    }
    
    public function createRectangle()
    {
        return new Rectangle;
    }
    
    public function createPrimitive()
    {
        return new Primitive;
    }

    public function createText()
    {
        return new Text;
    } 

    public function createColor()
    {
        return new Color;
    }    

    public function createColorSet()
    {
        return new ColorSet;
    }     

    public function createPalette()
    {
        return new Palette;
    } 

    public function createBound()
    {
        return new Bound;
    }    

    public function createAxis()
    {
        return new Axis;
    }     

    public function createPlot()
    {
        return new Plot;
    }     

    public function createCaption()
    {
        return new Caption;
    }    

    public function createChart()
    {
        return new Chart;
    }      

    public function createBarChart()
    {
        return new BarChart;
    }     

    public function createVerticalBarChart()
    {
        return new VerticalBarChart;
    }     

    public function createHorizontalBarChart()
    {
        return new HorizontalBarChart;
    }     

    public function createLineChart()
    {
        return new LineChart;
    }     

    public function createPieChart()
    {
        return new PieChart;
    }     


}

?>