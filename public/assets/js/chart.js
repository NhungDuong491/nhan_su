var showChart = (labels, data) => {
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
    
        // The data for our dataset
        data: {
            labels:labels,
            datasets: [
                {
                    label: 'Hoá đơn nhập',
                    borderColor: 'rgb(255, 99, 132)',
                    data: data 
                },
            ]
        },
    
        // Configuration options go here
        options: {}
    });
}

var showChart2 = (labels, data) => {
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
    
        // The data for our dataset
        data: {
            labels:labels,
            datasets: [
                {
                    label: 'Phiếu xuất',
                    borderColor: 'rgb(255, 99, 12)',
                    data: data 
                },
            ]
        },
    
        // Configuration options go here
        options: {}
    });
}

var showChart3 = (labels, data) => {
    var ctx = document.getElementById('myChart3').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',
    
        // The data for our dataset
        data: {
            labels:labels,
            datasets: [
                {
                    label: 'Hàng tồn',
                    borderColor: 'rgb(25, 99, 12)',
                    data: data 
                },
            ]
        },
    
        // Configuration options go here
        options: {}
    });
}