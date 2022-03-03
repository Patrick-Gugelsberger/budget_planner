//get Chart Data
let response = $.ajax({
    type: "GET",
    url: "data.php",
    async: false
});

//parse JSON String to turn into object
let data = JSON.parse(response.responseText);

//set Variable used for all Charts
let total = 0;

//set Variables to calculate costs per productType
let sweets = 0;
let food = 0;
let hygiene = 0;


//calculate costs per productType
data['product'].forEach(product => {
    total = product['quantity'] * product['price'];
        switch (product['productType']) {
            case 'sweets':
                sweets = sweets + total;
                break;
            case 'food':
                food = food + total;
                break;
            case 'hygiene':
                hygiene = hygiene + total;
                break;
        }
    }
)

//set Variables to calculate costs per apartmentType
let rent = 0;
let furniture = 0;
let otherApartmentCosts = 0;

//calculate costs per apartmentType
data['apartment'].forEach(apartment => {
    total = apartment['quantity'] * apartment['price'];
    switch (apartment['costType']) {
        case 'rent':
            rent = rent + total;
            break;
        case 'furniture':
            furniture = furniture + total;
            break;
        case 'otherCosts':
            otherApartmentCosts = otherApartmentCosts + total;
            break;
    }
})

//set Variable to calculate costs per carType
let fuel = 0;
let repairs = 0;
let otherCarCosts = 0;

//calculate costs per carType
data['car'].forEach(car => {
    total = car['quantity'] * car['price'];
    switch (car['costType']) {
        case 'fuel':
            fuel = fuel + total;
            break;
        case 'repairs':
            repairs = repairs + total;
            break;
        case 'otherCosts':
            otherCarCosts = otherCarCosts + total;
            break;
    }
})

//product chart
const productCtx = document.getElementById('productChart').getContext('2d');
const productChart = new Chart(productCtx, {
    type: 'pie',
    data: {
        labels: ['Süßigkeiten', 'Lebensmittel', 'Hygieneartikel'],
        datasets: [{
            label: '# of Votes',
            data: [sweets, food, hygiene],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(0, 51, 0, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(0, 51, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
});

//apartment chart
const apartmentCtx = document.getElementById('apartmentChart').getContext('2d');
const apartmentChart = new Chart(apartmentCtx, {
    type: 'pie',
    data: {
        labels: ['Miete', 'Einrichtung', 'Sonstige Kosten'],
        datasets: [{
            label: '# of Votes',
            data: [rent, furniture, otherApartmentCosts],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(0, 51, 0, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(0, 51, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
});

//car chart
const carCtx = document.getElementById('carChart').getContext('2d');
const carChart = new Chart(carCtx, {
    type: 'pie',
    data: {
        labels: ['Benzin', 'Reparaturen', 'Sonstige Kosten'],
        datasets: [{
            label: '# of Votes',
            data: [fuel, repairs, otherCarCosts],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(0, 51, 0, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(0, 51, 0, 1)'
            ],
            borderWidth: 1
        }]
    },
});
