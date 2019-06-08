$(document).ready(main);

function main() {
	var ctxOne = document.getElementById('chartOne').getContext('2d');
	var myChartOne = new Chart(ctxOne, {
		type: 'bar',
		data: {
			labels: ['ЛСР', 'ПИК Групп', 'Новострой', 'Рога и Копыта', 'Ленспецсму', 'Оранж'],
			datasets: [{
				label: '# of Votes',
				data: [12, 19, 3, 5, 2, 3],
				backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
				],
				borderColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
				],
				borderWidth: 2
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
	var myChartTwo, ctxTwo = document.getElementById('chartTwo').getContext('2d');
	myChartTwo = new Chart(ctxTwo, {
		type: 'radar',
		data: { 
			datasets:[{
				data:[12, 19, 3, 5, 2, 3]
			}],
			labels: ['ЛСР', 'ПИК Групп', 'Новострой', 'Рога и Копыта', 'Ленспецсму', 'Оранж']
		}
	});
	
	
	// Тестовый вызов данных о застройщиках
	$data = {
		action: 'get_companies_data'
	};

	$.post(AJAX.url, $data, function($response) {
		console.log($response);
	});
}