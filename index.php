<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>fullPage.js - Pure Javascript version</title>
	<meta name="author" content="Alvaro Trigo Lopez" />
	<meta name="description" content="fullPage plugin by Alvaro Trigo. Pure javascript version of full screen slider." />
	<meta name="keywords"  content="fullpage,jquery,alvaro,trigo,plugin,fullscren,screen,full,iphone5,apple,pure,javascript,slider,hijacking" />
	<meta name="Resource-type" content="Document" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="javascript.fullPage.css" />

	<style>
        @import url(https://fonts.googleapis.com/css?family=Varela+Round|Comfortaa:400,700,300);
		/* Reset CSS
		 * --------------------------------------- */
		body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,
		form,fieldset,input,textarea,p,blockquote,th,td {
		    padding: 0;
		    margin: 0;
		}
		a{
			text-decoration:none;
        }

		/* Custom CSS
		 * --------------------------------------- */
		body{
			font-family: Comfortaa;
            background: #000;
		}
		h1,h3,p,span {
          text-align: center;
            color: white;
        }
		.content{
			position: relative;
			top: 50%;
			transform: translateY(-50%);
			text-align: center;
		}

		/* Section 1
		 * --------------------------------------- */
		#section0{
			background-color: #000;
		}
		#section0 h1{
			color: #fff;
		}
		#section0 p{
			color: #fff;
			opacity: 0.4;
		}


		/* Section 2
		 * --------------------------------------- */
		#section1{
			background: black;
            text-align: center;
		}
		#section1 h1{
			color: #fff;
		}
		#section1 p{
            color: #fff;
			opacity: 0.8;
		}
        svg {
            outline: none;
            border-radius: 50%;
        }
        #svgbox {
            transform: scale(0.35);
            width: 100%;
            height: 40%;
            top: 0;
            bottom: 0;
            border-radius: 50%;
            margin: 0 0 2em 0;
        }
        #rotButtonr {
            color: white;
            position: relative;
            right: 0;
            display: inline-block;
        }
          
        .buttons {
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
            padding: 0;
            margin: auto;
            font-size: 2em;
        }
          
        #rotButtonl {
            color: white;
            position: relative;
            left: 0;
            display: inline-block;
        }

		/* Section 3
		 * --------------------------------------- */
		#section2{
			background-color: #000;
		}
		#section2 h1{
			color: #fff;
		}
		#section2 p{
			opacity: 0.6;
		}
        
        /* Section 4
		 * --------------------------------------- */
		#section3{
			background-color: #000;
            padding: 1em;
		}
		#section3 h1,p{
			color: #fff;
            padding: 1em;
		}
        #content-text {
            border: white 0.5px solid;
            border-radius: 10px;
            margin: 0.2em 2em;
            padding: 1em;
        }
        #content-text h3{
            margin: 1em;
        }
        #footer {
            position: absolute;
            right: 0;
            left: 0;
            bottom: 0;
            margin: 0;
            width: 100%;
            background-color: black;
            display: inline-block;
            text-align: center;
        }  
        
        #footer .fa {
            display: inline-block;
            padding: 10px;
            font-size: 30px;
            width: 30px;
            text-align: center;
            text-decoration: none;
            text-rendering: auto;
            border-radius: 50%;
            margin: 5px 2px;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
          color: gold;
        }

        .fa-twitter {
          color: gold;
        }

        .fa-google {
          color: gold;
        }

        .fa-youtube {
          color: gold;
        }

        .fa-instagram {
          color: gold;
        }

        .fa-snapchat-ghost {
          color: gold;
          text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        }

        .fa-envelope-square {
          color: gold;
        }
        @keyframes scrollAnim {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        #sd-indicator0 {
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            animation-name: scrollAnim;
            animation-iteration-count: infinite;
            animation-duration: 2s;
            margin: auto;
        }
        .sd-indicator1 {
            text-align: center;
            position: absolute;
            bottom: 0;
            animation-name: scrollAnim;
            animation-iteration-count: infinite;
            animation-duration: 2s;
            margin: auto;
        }
        
        .fullpage-wrapper {
	width: 100%!important;
	transform: none!important;
}

.fp-section {
	width: 100%!important;
	position: absolute;
	left: 0;
	top: 0;
	visibility: hidden;
	opacity: 0;
	z-index: 0;
	transition: all .7s ease-in-out;
}

.fp-section.active {
	visibility: visible;
	opacity: 1;
	z-index: 1;
}
        
        @media screen and (max-width:40em)
        {
            #svgbox {
                transform:  scale(0.75);
                height: 100%;
            }
            #sd-indicator0 {
                right: 0;
                left: 0;
            }
            .sd-indicator1 {
                right: 0;
                left: 0;
            }
            .sd-indicator2 {
                right: 0;
                left: 0;
            }
            .buttons,#rotButtonl, #rotButtonr {
                visibility: hidden;
            }
            #content-text {
                margin: 0;
                padding: 0;
                font-size: 0.72em;
            }
        }
	</style>
</head>
<body>
    
<div id="fullpage">
	<div class="section " id="section0">
		<div id="logo">
            <h1>Acumen IT 2K18</h1>
			<h1>Here comes our logo and animation for landing page</h1>
            <p id="sd-indicator0" style="left:0"><i class="fa fa-angle-double-down"></i> Scroll down <i class="fa fa-angle-double-down"></i></p>
		</div>
	</div>
	<div class="section" id="section1">
		 <div id="svgbox"> 
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 500 500" preserveAspectRatio="xMidYMid slice" xmlns:xlink="http://www.w3.org/1999/xlink" id="menu" draggable="true">
            <style>
                #menu {
                display: block; 
                margin: auto; 
                position: absolute;
            }
                .sector {
                    opacity: 0;
                }
                .item .sector {
                    transition: all .1s linear; fill:#333; stroke:gold ; stroke-width:2px;}
                .item:hover .sector { fill: #333; }
                .menu-trigger { pointer-events: visible;}
                .menu-trigger:hover { cursor: pointer; }
                .item use { fill: gold; }
                .item:hover .sector, .item:active .sector { fill:white; stroke:gold; }
                .item:hover use { fill:gold; }
                .menu-trigger > #inner {
                    fill:white;
                }
                #label {
                    pointer-events: none;
                    user-select: none;
                    fill:black;
                }
                text:selection {
                    background: none;
                }
            </style>
            <g id="symbolsContainer">	
                <symbol class="icon icon-" id="icon-1" viewBox="0 0 40 40"><path d="M32 18.451l-16-12.42-16 12.42v-5.064l16-12.42 16 12.42zM28 18v12h-8v-8h-8v8h-8v-12l12-9z" ></path></symbol>

                    <symbol class="icon icon-" id="icon-2" viewBox="0 0 40 40"><path d="M34 4h-2v-2c0-1.1-0.9-2-2-2h-28c-1.1 0-2 0.9-2 2v24c0 1.1 0.9 2 2 2h2v2c0 1.1 0.9 2 2 2h28c1.1 0 2-0.9 2-2v-24c0-1.1-0.9-2-2-2zM4 6v20h-1.996c-0.001-0.001-0.003-0.002-0.004-0.004v-23.993c0.001-0.001 0.002-0.003 0.004-0.004h27.993c0.001 0.001 0.003 0.002 0.004 0.004v1.996h-24c-1.1 0-2 0.9-2 2v0zM34 29.996c-0.001 0.001-0.002 0.003-0.004 0.004h-27.993c-0.001-0.001-0.003-0.002-0.004-0.004v-23.993c0.001-0.001 0.002-0.003 0.004-0.004h27.993c0.001 0.001 0.003 0.002 0.004 0.004v23.993z" ></path>
                        <path d="M30 11c0 1.657-1.343 3-3 3s-3-1.343-3-3 1.343-3 3-3 3 1.343 3 3z" ></path>
                        <path d="M32 28h-24v-4l7-12 8 10h2l7-6z" ></path></symbol>

                    <symbol class="icon icon-" id="icon-3" viewBox="0 0 40 40"><path d="M15 4c-1.583 0-3.112 0.248-4.543 0.738-1.341 0.459-2.535 1.107-3.547 1.926-1.876 1.518-2.91 3.463-2.91 5.474 0 1.125 0.315 2.217 0.935 3.247 0.646 1.073 1.622 2.056 2.821 2.842 0.951 0.624 1.592 1.623 1.761 2.748 0.028 0.187 0.051 0.375 0.068 0.564 0.085-0.079 0.169-0.16 0.254-0.244 0.754-0.751 1.771-1.166 2.823-1.166 0.167 0 0.335 0.011 0.503 0.032 0.605 0.077 1.223 0.116 1.836 0.116 1.583 0 3.112-0.248 4.543-0.738 1.341-0.459 2.535-1.107 3.547-1.926 1.876-1.518 2.91-3.463 2.91-5.474s-1.033-3.956-2.91-5.474c-1.012-0.819-2.206-1.467-3.547-1.926-1.431-0.49-2.96-0.738-4.543-0.738zM15 0v0c8.284 0 15 5.435 15 12.139s-6.716 12.139-15 12.139c-0.796 0-1.576-0.051-2.339-0.147-3.222 3.209-6.943 3.785-10.661 3.869v-0.785c2.008-0.98 3.625-2.765 3.625-4.804 0-0.285-0.022-0.564-0.063-0.837-3.392-2.225-5.562-5.625-5.562-9.434 0-6.704 6.716-12.139 15-12.139zM31.125 27.209c0 1.748 1.135 3.278 2.875 4.118v0.673c-3.223-0.072-6.181-0.566-8.973-3.316-0.661 0.083-1.337 0.126-2.027 0.126-2.983 0-5.732-0.805-7.925-2.157 4.521-0.016 8.789-1.464 12.026-4.084 1.631-1.32 2.919-2.87 3.825-4.605 0.961-1.84 1.449-3.799 1.449-5.825 0-0.326-0.014-0.651-0.039-0.974 2.268 1.873 3.664 4.426 3.664 7.24 0 3.265-1.88 6.179-4.82 8.086-0.036 0.234-0.055 0.474-0.055 0.718z" ></path></symbol>

                    <symbol class="icon icon-" id="icon-4" viewBox="0 0 1792 1792"><path d="M192 1664h288v-288h-288v288zm352 0h320v-288h-320v288zm-352-352h288v-320h-288v320zm352 0h320v-320h-320v320zm-352-384h288v-288h-288v288zm736 736h320v-288h-320v288zm-384-736h320v-288h-320v288zm768 736h288v-288h-288v288zm-384-352h320v-320h-320v320zm-352-864v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm736 864h288v-320h-288v320zm-384-384h320v-288h-320v288zm384 0h288v-288h-288v288zm32-480v-288q0-13-9.5-22.5t-22.5-9.5h-64q-13 0-22.5 9.5t-9.5 22.5v288q0 13 9.5 22.5t22.5 9.5h64q13 0 22.5-9.5t9.5-22.5zm384-64v1280q0 52-38 90t-90 38h-1408q-52 0-90-38t-38-90v-1280q0-52 38-90t90-38h128v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h384v-96q0-66 47-113t113-47h64q66 0 113 47t47 113v96h128q52 0 90 38t38 90z"/></symbol>

                    <symbol class="icon icon-" id="icon-5" viewBox="0 0 1792 1792"><path d="M1523 1339q-22-155-87.5-257.5t-184.5-118.5q-67 74-159.5 115.5t-195.5 41.5-195.5-41.5-159.5-115.5q-119 16-184.5 118.5t-87.5 257.5q106 150 271 237.5t356 87.5 356-87.5 271-237.5zm-243-699q0-159-112.5-271.5t-271.5-112.5-271.5 112.5-112.5 271.5 112.5 271.5 271.5 112.5 271.5-112.5 112.5-271.5zm512 256q0 182-71 347.5t-190.5 286-285.5 191.5-349 71q-182 0-348-71t-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z"/>
            </symbol>

                <symbol class="icon icon-" id="icon-6" viewBox="0 0 2048 1792"><path d="M657 896q-162 5-265 128h-134q-82 0-138-40.5t-56-118.5q0-353 124-353 6 0 43.5 21t97.5 42.5 119 21.5q67 0 133-23-5 37-5 66 0 139 81 256zm1071 637q0 120-73 189.5t-194 69.5h-874q-121 0-194-69.5t-73-189.5q0-53 3.5-103.5t14-109 26.5-108.5 43-97.5 62-81 85.5-53.5 111.5-20q10 0 43 21.5t73 48 107 48 135 21.5 135-21.5 107-48 73-48 43-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-1024-1277q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm704 384q0 159-112.5 271.5t-271.5 112.5-271.5-112.5-112.5-271.5 112.5-271.5 271.5-112.5 271.5 112.5 112.5 271.5zm576 225q0 78-56 118.5t-138 40.5h-134q-103-123-265-128 81-117 81-256 0-29-5-66 66 23 133 23 59 0 119-21.5t97.5-42.5 43.5-21q124 0 124 353zm-128-609q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181z"/></symbol>

                <symbol class="icon icon-" id="icon-7" viewBox="0 0 1792 1792"><path d="M1152 640q0-106-75-181t-181-75-181 75-75 181 75 181 181 75 181-75 75-181zm256 0q0 109-33 179l-364 774q-16 33-47.5 52t-67.5 19-67.5-19-46.5-52l-365-774q-33-70-33-179 0-212 150-362t362-150 362 150 150 362z"/></symbol>

                <symbol class="icon icon-" id="icon-8" viewBox="0 0 2304 1792"><path d="M192 1152q40 0 56-32t0-64-56-32-56 32 0 64 56 32zm1473-58q-10-13-38.5-50t-41.5-54-38-49-42.5-53-40.5-47-45-49l-125 140q-83 94-208.5 92t-205.5-98q-57-69-56.5-158t58.5-157l177-206q-22-11-51-16.5t-47.5-6-56.5.5-49 1q-92 0-158 66l-158 158h-155v544q5 0 21-.5t22 0 19.5 2 20.5 4.5 17.5 8.5 18.5 13.5l297 292q115 111 227 111 78 0 125-47 57 20 112.5-8t72.5-85q74 6 127-44 20-18 36-45.5t14-50.5q10 10 43 10 43 0 77-21t49.5-53 12-71.5-30.5-73.5zm159 58h96v-512h-93l-157-180q-66-76-169-76h-167q-89 0-146 67l-209 243q-28 33-28 75t27 75q43 51 110 52t111-49l193-218q25-23 53.5-21.5t47 27 8.5 56.5q16 19 56 63t60 68q29 36 82.5 105.5t64.5 84.5q52 66 60 140zm288 0q40 0 56-32t0-64-56-32-56 32 0 64 56 32zm192-576v640q0 26-19 45t-45 19h-434q-27 65-82 106.5t-125 51.5q-33 48-80.5 81.5t-102.5 45.5q-42 53-104.5 81.5t-128.5 24.5q-60 34-126 39.5t-127.5-14-117-53.5-103.5-81l-287-282h-358q-26 0-45-19t-19-45v-672q0-26 19-45t45-19h421q14-14 47-48t47.5-48 44-40 50.5-37.5 51-25.5 62-19.5 68-5.5h117q99 0 181 56 82-56 181-56h167q35 0 67 6t56.5 14.5 51.5 26.5 44.5 31 43 39.5 39 42 41 48 41.5 48.5h355q26 0 45 19t19 45z"/></symbol>

            </g>
            <g id="itemsContainer" data-svg-origin="250 250" transform="matrix(0.38734, -0.92193, 0.92193, 0.38734, -77.3193578290572, 383.64893561257276)">
                <a  class="item" id="item-1" xlink:href=" " xlink:title=" " transform="matrix(1,0,0,1,0,0)" data-svg-origin="250 250" style="">
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-1" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
                <a  href="pages/sponsors.html" class="item" id="item-2" xlink:href=" " xlink:title=" " transform="matrix(0.7071,-0.7071,0.7071,0.7071,-103.55339059327378,249.99999999999997)" data-svg-origin="250 250" style="">
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-8" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
                <a  href="pages/registration.html" class="item" id="item-3" xlink:href=" " xlink:title=" " transform="matrix(0,-1,1,0,0,500)" data-svg-origin="250 250" style="">
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-5" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
                <a  class="item" id="item-4" href="pages/events.html" xlink:href=" " xlink:title=" " transform="matrix(-0.7071,-0.7071,0.7071,-0.7071,249.99999999999997,603.5533905932738)" data-svg-origin="250 250" style="">     
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-4" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
                <a  class="item" id="item-5" href="pages/map.html" xlink:href=" " xlink:title=" " transform="matrix(-1,0,0,-1,500,500)" data-svg-origin="250 250" style="">
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-7" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
                <a  class="item" id="item-6" href="pages/team.html" xlink:href=" " xlink:title=" " transform="matrix(-0.7071,0.7071,-0.7071,-0.7071,603.5533905932738,250.00000000000006)" data-svg-origin="250 250" style=""> 
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-6" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
                <a  class="item" id="item-7" href="pages/social.html" xlink:href=" " xlink:title=" " transform="matrix(0,1,-1,0,500.00000000000006,0)" data-svg-origin="250 250" style="">
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-3" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
                <a  class="item" id="item-8" href="pages/gallery.html" xlink:href=" " xlink:title=" " transform="matrix(0.7071,0.7071,-0.7071,0.7071,250.00000000000009,-103.55339059327378)" data-svg-origin="250 250" style="">
                    <circle class="sector" cx="250" cy="250" r="40" />
                    <use xlink:href="#icon-2" width="40" height="40" x="394.4505615234375" y="161.88233947753906" transform="rotate(67.5 414.4505615234375 181.88233947753906)"></use>
                </a>
            </g>
            <g id="trigger" class="trigger menu-trigger">
                <circle id="animCircle" cx = "50%" cy = "50%" r = "80" fill="none" style="stroke-width:3px" stroke="#ada4a4">
                    <animate attributeName="r" begin="0s" dur="1.2s" repeatCount="indefinite" from="55" to="65"/>
                </circle>
                <circle id="outer" cx="250" cy="250" r="85" fill="#0b6887"></circle>
                <circle id="inner" cx="250" cy="250" r="80" fill="#000"></circle>
                <text id="label" text-anchor="middle" transform="rotate(0,250,250)" alignment-baseline="central" x="250" y="250" fill="#000" font-size="1.5em">Home</text>
            </g>
                <animateTransform 
                       xlink:href="#menu"
                       attributeName="transform" 
                       attributeType="XML"
                       id="ani-svg"
                       type="rotate"
                       from="0"
                       to="0" 
                       dur="0.3s"
                       begin="rotateSVG"
                       repeatCount="1"
                       fill="freeze" />
            </svg>
        </div>
        <ul class="buttons">
            <li id="rotButtonl" ><i class="fa fa-undo"></i></li>
            <li id="rotButtonr" ><i class="fa fa-undo fa-flip-horizontal"></i></li>
        </ul>
        <p class="sd-indicator1" style="left:0"><i class="fa fa-angle-double-down"></i> Scroll down <i class="fa fa-angle-double-down"></i></p>
        <p class="sd-indicator1" style="right:0"><i class="fa fa-angle-double-down"></i> Scroll down <i class="fa fa-angle-double-down"></i></p>
	</div>
	<div class="section" id="section2">
		<h1>Highlights here</h1>
	</div>
    <div class="section" id="section3">
        <div id="content-text">
            <h3>About <strong>ACUMEN</strong></h3>
            <p>The pace of progress in the field of Science &amp; Technology in this millennium has overshadowed the speed of Technological changes in the past decades. In this millennium, this pace would intensify and may even reach a state beyond our imagination. Technical Symposiums like Acumen are an effort to catch up with the pace of technological innovation. </p>
            <p>Acumen triggered off in the year 1996. It was the first of its kind in Hyderabad and had an overwhelming response. It paved way to Acumen '99, which was a great success, too. Around 180 papers from various parts of the country were received and students from various universities and institutes like IIT, NIT etc. have participated in this symposium. </p>
            <p>ACUMEN is a technical festival. The event seeks to achieve communication of innovative ideas that promote the cause of the technological advantage among the students, and also  keep them abreast with the latest advances in their respective fields. It also opens a window to the participants to interact with people from different backgrounds and upgrade their knowledge. </p>
            <p>The theme <strong style="font-size: 150%">"YOUTH-TECHNOLOGY-FUTURE"</strong> asserts the fact that the future of technology lies in the hands of the youth. </p>
        </div>
        <div id="footer">
            <h3 style="color: gold;position: relative;left: 0;right: 0;margin: auto">Follow us on</h3>
            <div style="position: relative;left: 0;right: 0;margin: auto">
                <a target="_blank" href="https://www.facebook.com/Acumen-IT-2k18-157441931624578/" class="fa fa-facebook"></a>
                <a target="_blank" href="https://www.instagram.com/acumen_it_2k18/" class="fa fa-instagram"></a>
                <a target="_blank" href="https://www.snapchat.com/add/acumen-it" class="fa fa-snapchat-ghost"></a>
                <a target="_blank" href="https://twitter.com/AcumenIT1" class="fa fa-twitter"></a>
                <a target="_blank" href="mailto:acumenit2k18@gmail.com" class="fa fa-envelope-square"></a>
                <h2 style="color:white; padding:0; margin: 0;"><strong>Hit count : 
                    <?php include 'count.php';?>     
                </strong></h2>
            </div>
        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.0/TweenMax.min.js'></script>
<script  src="js/index.js" type="text/javascript"></script>
<script type="text/javascript" src="javascript.fullPage.js"></script>
<script type="text/javascript">
	fullpage.initialize('#fullpage', {
		anchors: ['logo', 'nav', 'highlights', 'about'],
		menu: '#menu',
		css3:true
	});

</script>

</body>
</html>
