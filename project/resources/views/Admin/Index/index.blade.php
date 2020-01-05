@extends('admin.layout.index')
@section('content')
@section('title','后台主页')
    <div class="mws-stat-container clearfix">

        <!-- Statistic Item -->
        <a class="mws-stat" href="/d/#">
            <!-- Statistic Icon (edit to change icon) -->
            <span class="mws-stat-icon icol32-building"></span>

            <!-- Statistic Content -->
            <span class="mws-stat-content">
                        	<span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">爬楼</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">324</font></font></span>
                        </span>
        </a>

        <a class="mws-stat" href="/d/#">
            <!-- Statistic Icon (edit to change icon) -->
            <span class="mws-stat-icon icol32-sport"></span>

            <!-- Statistic Content -->
            <span class="mws-stat-content">
                        	<span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">卡路里消耗了</font></font></span>
                            <span class="mws-stat-value down"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">74％</font></font></span>
                        </span>
        </a>

        <a class="mws-stat" href="/d/#">
            <!-- Statistic Icon (edit to change icon) -->
            <span class="mws-stat-icon icol32-walk"></span>

            <!-- Statistic Content -->
            <span class="mws-stat-content">
                        	<span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">步行</font></font></span>
                            <font style="vertical-align: inherit;"><span class="mws-stat-value"><font style="vertical-align: inherit;">14 </font></span><span class="mws-stat-title"><font style="vertical-align: inherit;">公里</font></span></font><span class="mws-stat-value"><font style="vertical-align: inherit;"></font></span>
                        </span>
        </a>

        <a class="mws-stat" href="/d/#">
            <!-- Statistic Icon (edit to change icon) -->
            <span class="mws-stat-icon icol32-bug"></span>

            <!-- Statistic Content -->
            <span class="mws-stat-content">
                        	<span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">错误修正</font></font></span>
                            <span class="mws-stat-value up"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">22％</font></font></span>
                        </span>
        </a>

        <a class="mws-stat" href="/d/#">
            <!-- Statistic Icon (edit to change icon) -->
            <span class="mws-stat-icon icol32-car"></span>

            <!-- Statistic Content -->
            <span class="mws-stat-content">
                        	<span class="mws-stat-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">修车</font></font></span>
                            <span class="mws-stat-value"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">77</font></font></span>
                        </span>
        </a>
    </div>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-pictures"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 图片库</font></font></span>
        </div>
        <div class="mws-panel-body">
            <ul class="thumbnails mws-gallery">
                <li>
                    <span class="thumbnail"><img src="/d/example/cyan_hawk.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/cyan_hawk.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/cyan_kangaroo.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/cyan_kangaroo.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/cyan_koala.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/cyan_koala.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/cyan_kookaburra.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/cyan_kookaburra.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/cyan_wallaby.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/cyan_wallaby.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_buffalo.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_buffalo.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_cat.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_cat.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_fish.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_fish.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_underwater3.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_underwater3.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_horse.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_horse.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_meercats.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_meercats.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_penguin.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_penguin.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_squirrel.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_squirrel.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_underwater2.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_underwater2.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_underwater4.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_underwater4.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
                <li>
                    <span class="thumbnail"><img src="/d/example/scottwills_underwater5.jpg" alt=""></span>
                    <span class="mws-gallery-overlay">
                                    <a href="/d/example/scottwills_underwater5.jpg" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                </li>
            </ul>
        </div>
    </div>
@endsection