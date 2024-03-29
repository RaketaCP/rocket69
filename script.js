/**
 * [chartjs-plugin-labels]{@link https://github.com/emn178/chartjs-plugin-labels}
 *
 * @version 1.1.0
 * @author Chen, Yi-Cyuan [emn178@gmail.com]
 * @copyright Chen, Yi-Cyuan 2017-2018
 * @license MIT
 */
(function(){function f(){this.renderToDataset=this.renderToDataset.bind(this)}if("undefined"===typeof Chart)console.error("Can not find Chart object.");else{"function"!=typeof Object.assign&&(Object.assign=function(a,c){if(null==a)throw new TypeError("Cannot convert undefined or null to object");for(var b=Object(a),e=1;e<arguments.length;e++){var d=arguments[e];if(null!=d)for(var g in d)Object.prototype.hasOwnProperty.call(d,g)&&(b[g]=d[g])}return b});var k={};["pie","doughnut","polarArea","bar"].forEach(function(a){k[a]=
!0});f.prototype.setup=function(a,c){this.chart=a;this.ctx=a.ctx;this.args={};this.barTotal={};var b=a.config.options;this.options=Object.assign({position:"default",precision:0,fontSize:b.defaultFontSize,fontColor:b.defaultFontColor,fontStyle:b.defaultFontStyle,fontFamily:b.defaultFontFamily,shadowOffsetX:3,shadowOffsetY:3,shadowColor:"rgba(0,0,0,0.3)",shadowBlur:6,images:[],outsidePadding:2,textMargin:2,overlap:!0},c);"bar"===a.config.type&&(this.options.position="default",this.options.arc=!1,this.options.overlap=
!0)};f.prototype.render=function(){this.labelBounds=[];this.chart.data.datasets.forEach(this.renderToDataset)};f.prototype.renderToDataset=function(a,c){this.totalPercentage=0;this.total=null;var b=this.args[c];b.meta.data.forEach(function(c,d){this.renderToElement(a,b,c,d)}.bind(this))};f.prototype.renderToElement=function(a,c,b,e){if(this.shouldRenderToElement(c.meta,b)&&(this.percentage=null,c=this.getLabel(a,b,e))){var d=this.ctx;d.save();d.font=Chart.helpers.fontString(this.options.fontSize,
this.options.fontStyle,this.options.fontFamily);var g=this.getRenderInfo(b,c);this.drawable(b,c,g)&&(d.beginPath(),d.fillStyle=this.getFontColor(a,b,e),this.renderLabel(c,g));d.restore()}};f.prototype.renderLabel=function(a,c){return this.options.arc?this.renderArcLabel(a,c):this.renderBaseLabel(a,c)};f.prototype.renderBaseLabel=function(a,c){var b=this.ctx;if("object"===typeof a)b.drawImage(a,c.x-a.width/2,c.y-a.height/2,a.width,a.height);else{b.save();b.textBaseline="top";b.textAlign="center";this.options.textShadow&&
(b.shadowOffsetX=this.options.shadowOffsetX,b.shadowOffsetY=this.options.shadowOffsetY,b.shadowColor=this.options.shadowColor,b.shadowBlur=this.options.shadowBlur);for(var e=a.split("\n"),d=0;d<e.length;d++)b.fillText(e[d],c.x,c.y-this.options.fontSize/2*e.length+this.options.fontSize*d);b.restore()}};f.prototype.renderArcLabel=function(a,c){var b=this.ctx,e=c.radius,d=c.view;b.save();b.translate(d.x,d.y);if("string"===typeof a){b.rotate(c.startAngle);b.textBaseline="middle";b.textAlign="left";d=
a.split("\n");var g=0,l=[],f=0;"border"===this.options.position&&(f=(d.length-1)*this.options.fontSize/2);for(var h=0;h<d.length;++h){var m=b.measureText(d[h]);m.width>g&&(g=m.width);l.push(m.width)}for(h=0;h<d.length;++h){var n=d[h],k=(d.length-1-h)*-this.options.fontSize+f;b.save();b.rotate((g-l[h])/2/e);for(var p=0;p<n.length;p++){var q=n.charAt(p);m=b.measureText(q);b.save();b.translate(0,-1*e);b.fillText(q,0,k);b.restore();b.rotate(m.width/e)}b.restore()}}else b.rotate((d.startAngle+Math.PI/
2+c.endAngle)/2),b.translate(0,-1*e),this.renderLabel(a,{x:0,y:0});b.restore()};f.prototype.shouldRenderToElement=function(a,c){return!a.hidden&&!c.hidden&&(this.options.showZero||"polarArea"===this.chart.config.type?0!==c._view.outerRadius:0!==c._view.circumference)};f.prototype.getLabel=function(a,c,b){if("function"===typeof this.options.render)a=this.options.render({label:this.chart.config.data.labels[b],value:a.data[b],percentage:this.getPercentage(a,c,b),dataset:a,index:b});else switch(this.options.render){case "value":a=
a.data[b];break;case "label":a=this.chart.config.data.labels[b];break;case "image":a=this.options.images[b]?this.loadImage(this.options.images[b]):"";break;default:a=this.getPercentage(a,c,b)+"%"}"object"===typeof a?a=this.loadImage(a):null!==a&&void 0!==a&&(a=a.toString());return a};f.prototype.getFontColor=function(a,c,b){var e=this.options.fontColor;"function"===typeof e?e=e({label:this.chart.config.data.labels[b],value:a.data[b],percentage:this.getPercentage(a,c,b),backgroundColor:a.backgroundColor[b],
dataset:a,index:b}):"string"!==typeof e&&(e=e[b]||this.chart.config.options.defaultFontColor);return e};f.prototype.getPercentage=function(a,c,b){if(null!==this.percentage)return this.percentage;if("polarArea"===this.chart.config.type){if(null===this.total)for(c=this.total=0;c<a.data.length;++c)this.total+=a.data[c];a=a.data[b]/this.total*100}else if("bar"===this.chart.config.type){if(void 0===this.barTotal[b])for(c=this.barTotal[b]=0;c<this.chart.data.datasets.length;++c)this.barTotal[b]+=this.chart.data.datasets[c].data[b];
a=a.data[b]/this.barTotal[b]*100}else a=c._view.circumference/this.chart.config.options.circumference*100;a=parseFloat(a.toFixed(this.options.precision));this.options.showActualPercentages||("bar"===this.chart.config.type&&(this.totalPercentage=this.barTotalPercentage[b]||0),this.totalPercentage+=a,100<this.totalPercentage&&(a-=this.totalPercentage-100,a=parseFloat(a.toFixed(this.options.precision))),"bar"===this.chart.config.type&&(this.barTotalPercentage[b]=this.totalPercentage));return this.percentage=
a};f.prototype.getRenderInfo=function(a,c){return"bar"===this.chart.config.type?this.getBarRenderInfo(a,c):this.options.arc?this.getArcRenderInfo(a,c):this.getBaseRenderInfo(a,c)};f.prototype.getBaseRenderInfo=function(a,c){if("outside"===this.options.position||"border"===this.options.position){var b,e=a._view,d=e.startAngle+(e.endAngle-e.startAngle)/2,g=e.outerRadius/2;"border"===this.options.position?b=(e.outerRadius-g)/2+g:"outside"===this.options.position&&(b=e.outerRadius-g+g+this.options.textMargin);
b={x:e.x+Math.cos(d)*b,y:e.y+Math.sin(d)*b};"outside"===this.options.position&&(d=this.options.textMargin+this.measureLabel(c).width/2,b.x+=b.x<e.x?-d:d);return b}return a.tooltipPosition()};f.prototype.getArcRenderInfo=function(a,c){var b=a._view;var e="outside"===this.options.position?b.outerRadius+this.options.fontSize+this.options.textMargin:"border"===this.options.position?(b.outerRadius/2+b.outerRadius)/2:(b.innerRadius+b.outerRadius)/2;var d=b.startAngle,g=b.endAngle,l=g-d;d+=Math.PI/2;g+=
Math.PI/2;var f=this.measureLabel(c);d+=(g-(f.width/e+d))/2;return{radius:e,startAngle:d,endAngle:g,totalAngle:l,view:b}};f.prototype.getBarRenderInfo=function(a,c){var b=a.tooltipPosition();b.y-=this.measureLabel(c).height/2+this.options.textMargin;return b};f.prototype.drawable=function(a,c,b){if(this.options.overlap)return!0;if(this.options.arc)return b.endAngle-b.startAngle<=b.totalAngle;var e=this.measureLabel(c);c=b.x-e.width/2;var d=b.x+e.width/2,g=b.y-e.height/2;b=b.y+e.height/2;return"outside"===
this.options.renderInfo?this.outsideInRange(c,d,g,b):a.inRange(c,g)&&a.inRange(c,b)&&a.inRange(d,g)&&a.inRange(d,b)};f.prototype.outsideInRange=function(a,c,b,e){for(var d=this.labelBounds,g=0;g<d.length;++g){for(var f=d[g],k=[[a,b],[a,e],[c,b],[c,e]],h=0;h<k.length;++h){var m=k[h][0],n=k[h][1];if(m>=f.left&&m<=f.right&&n>=f.top&&n<=f.bottom)return!1}k=[[f.left,f.top],[f.left,f.bottom],[f.right,f.top],[f.right,f.bottom]];for(h=0;h<k.length;++h)if(m=k[h][0],n=k[h][1],m>=a&&m<=c&&n>=b&&n<=e)return!1}d.push({left:a,
right:c,top:b,bottom:e});return!0};f.prototype.measureLabel=function(a){if("object"===typeof a)return{width:a.width,height:a.height};var c=0;a=a.split("\n");for(var b=0;b<a.length;++b){var e=this.ctx.measureText(a[b]);e.width>c&&(c=e.width)}return{width:c,height:this.options.fontSize*a.length}};f.prototype.loadImage=function(a){var c=new Image;c.src=a.src;c.width=a.width;c.height=a.height;return c};Chart.plugins.register({id:"labels",beforeDatasetsUpdate:function(a,c){if(k[a.config.type]){Array.isArray(c)||
(c=[c]);var b=c.length;a._labels&&b===a._labels.length||(a._labels=c.map(function(){return new f}));for(var e=!1,d=0,g=0;g<b;++g){var l=a._labels[g];l.setup(a,c[g]);"outside"===l.options.position&&(e=!0,l=1.5*l.options.fontSize+l.options.outsidePadding,l>d&&(d=l))}e&&(a.chartArea.top+=d,a.chartArea.bottom-=d)}},afterDatasetUpdate:function(a,c,b){k[a.config.type]&&a._labels.forEach(function(a){a.args[c.index]=c})},beforeDraw:function(a){k[a.config.type]&&a._labels.forEach(function(a){a.barTotalPercentage=
{}})},afterDatasetsDraw:function(a){k[a.config.type]&&a._labels.forEach(function(a){a.render()})}})}})();


(function($) {
    $(document).on('facetwp-loaded', function() {
        if($('#companies-table').length) {
			$('#companies-table').DataTable().destroy();
			$('#companies-table').DataTable({
				"pageLength": 20,
				'bFilter': false,
				"bInfo" : false,
				"lengthChange": false,
				language: {
					"sZeroRecords": "Ничего не найдено - извините",
					"oPaginate": {
						"sFirst": "Первая",
						"sLast":"Посл.",
						"sNext":"→",
						"sPrevious":"←"			
					} 
				},
			});
		}
     });
})(jQuery);


function main($, val) {

	
	if (document.getElementById('radarChart')) {
		var radarChart, ctxRadar = document.getElementById('radarChart').getContext('2d');
		radarChart = new Chart(ctxRadar, {
			type: 'radar',
			data: { 
				datasets:[{
					data:[12, 19, 3, 5, 2, 3]
				}],
				labels: ['ЛСР', 'ПИК Групп', 'Новострой', 'Рога и Копыта', 'Ленспецсму', 'Оранж']
			}
		});
	}
	
	function byCompany(company) {
		var inTime = 0, delayed = 0
		company.estates.forEach(function(estate) {
			if (estate.buildingState == "Просрочено") {
				delayed++;
			}
			if (estate.buildingState == "Завершено") {
				inTime++;
			}
		});
		return {labels: ["Просрочено", "Завершено"], data: [delayed, inTime]};
	}
	
	function byRegion($response) {
		var regions = {};
		$response.forEach(function(company) {
			company.estates.forEach(function(estate) {
				if (regions[estate.buildingRegion] == null) {regions[estate.buildingRegion] = 1;}
				else {regions[estate.buildingRegion] = regions[estate.buildingRegion]+1}
			});
		});
		return {labels:Object.keys(regions), data: Object.values(regions)};
	}
	
	function byYear($response) {
		var years = {};
		$response.forEach(function(company) {
			company.estates.forEach(function(estate) {
				if (estate.buildingEstimatedFinishDate && buildingState == "Просрочено") {
					if (years[buildingEstimatedFinishDate] == null) {years[buildingEstimatedFinishDate] = 1;}
					else {years[buildingEstimatedFinishDate] = years[buildingEstimatedFinishDate]+1;}
				}
				if (years[estate.buildingRegion] == null) {years[estate.buildingRegion] = 1;}
				else {years[estate.buildingRegion] = years[estate.buildingRegion]+1}
			});
		});
	}
	
	// Тестовый вызов данных о застройщиках
	$data = {
		action: 'get_companies_data'
	};
	
	renderChart(val);
	function renderChart(val) {
		$.post(AJAX.url, $data, function($response) {
			$response=$response.substr(0,$response.length-1);
			$response=JSON.parse($response);
			var chartData = null;
			if (document.getElementById('doughnutChart')) {
				var doughnutChart, ctxDoughnut = document.getElementById('doughnutChart').getContext('2d')
				,bgcolors = ['rgb(204,51,0)','rgb(51,204,51)','rgba(255, 206, 86)'];
				
				if (val == null) val = 0;
				if (typeof val == "string") {
					$response.forEach(function(company, index) {
						if (company.companyName == val) {
							val = index;
							return;
						}
					});
				} else {
					chartData = {data:[30, 70], labels: ["Просрочено", "Завершено"]}
				}
				
				var company = $response[val];
				if (chartData == null) {
					chartData = byCompany($response[val]);
				}
				//chartData = {data:[30, 70], labels: ["Просрочено", "Завершено"]}
				console.log(chartData);
				doughnutData = {
					datasets: [{
						data: chartData.data,
						backgroundColor: bgcolors
					}],

					labels: chartData.labels
				};
				
				var options = {
					tooltips: {
						enabled: false
					},
					plugins: {
						labels: {
							render: 'percentage',
							fontColor: '#fff'
						}
					}
				};
				
				doughnutChart = new Chart(ctxDoughnut, {
					type: 'pie',
					data: doughnutData,
					options: options
				});
			}
					
			if (document.getElementById('barChart')) {
				var ctxBar = document.getElementById('barChart').getContext('2d');
				var barChart = new Chart(ctxBar, {
					type: 'bar',
					data: {
						labels: ['2014', '2015', '2016', '2017', '2018'],
						datasets: [{
							label: 'Всего построек',
							data: [10, 19, 3, 5, 2],
							backgroundColor: 'rgb(51,204,51)'
						},
						{
							label: "Просрочено",
							data: [2,2,3,4,5],
							backgroundColor: 'rgb(204,51,0)',
						}]
					},
					options: {
						scales: {
							yAxes: [{
								ticks: {
									beginAtZero: true
								},
								stacked: true
							}],
							xAxes: [{
								stacked: true
							}]
						}
					}
				});
			}
		
		});
	}
	

}
