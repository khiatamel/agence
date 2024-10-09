<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/L1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/ajouHotel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Sanhadja Voyage</title>
</head>
<style>
  /* Global Styles */
  body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}
.details {
    max-width: 1200px;
    margin: 40px auto;
    padding: 30px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    justify-content: center;
    align-items: center;
}

h1 {
    font-size: 2.8rem;
    color: #2a2a2a;
    margin-bottom: 20px;
    text-align: center;
    border-bottom: 3px solid #f5c518;
    display: inline-block;
    padding-bottom: 8px;
}

h3 {
    font-size: 2rem;
    color: #444;
    margin-top: 40px;
    border-bottom: 2px solid #f5c518;
    padding-bottom: 8px;
}

p, ul {
    font-size: 1.2rem;
    color: #555;
    line-height: 1.7;
}

ul {
    padding: 0;
    margin: 15px 0;
}

ul li {
    background-color: #fafafa;
    border: 1px solid #ddd;
    padding: 10px;
    margin: 5px 0;
    border-radius: 8px;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th, table td {
    
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

table th {
    background-color: #f5f5f5;
    font-size: 1.3rem;
}

table td {
    align-items: center;
    justify-content: space-between;
    background-color: #fff;
    font-size: 1.2rem;
}

a {
    display: inline-block;
    margin-top: 30px;
    padding: 12px 20px;
    background-color: #f5c518;
    color: #fff;
    font-size: 1.2rem;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s;
    text-align: center;
}

a:hover {
    background-color: #e5a00d;
}

.sliding-container {
    position: relative;
    max-width: 1000px;
    margin: 40px auto;
    overflow: hidden;
    border-radius: 10px;
}

.slides-container {
    display: flex;
    transition: transform 0.4s ease-in-out;
}

.slide {
    min-width: 100%;
    height: 400px;
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 12px;
    cursor: pointer;
    font-size: 18px;
    z-index: 10;
    border-radius: 50%;
    transition: background-color 0.3s;
}

.prev {
    right: 20px;
}

.next {
    left: 20px;
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.8);
}


</style>


<body>
<div class="details">
    <h1>{{ $hotel->nom }}</h1>
    <p><strong>Adresse:</strong> {{ $hotel->adresse }}</p>
    <p><strong>Description:</strong>م {{ $hotel->desc }}</p>

    <h3>Services disponibles:</h3>
    <ul>
        <li>Petit Déjeuner: {{ $hotel->petit_dejeuner ? 'Oui' : 'Non' }}</li>
        <li>Demi Pension: {{ $hotel->demi_pension ? 'Oui' : 'Non' }}</li>
        <li>Pension Complète: {{ $hotel->pension_complete ? 'Oui' : 'Non' }}</li>
        <li>All Inclusive: {{ $hotel->all_inclusive ? 'Oui' : 'Non' }}</li>
        <li>All In Soft: {{ $hotel->all_insoft ? 'Oui' : 'Non' }}</li>
        <li>Vue Mer: {{ $hotel->vue_mer ? 'Oui' : 'Non' }}</li>
    </ul>

    <!-- Display Tarifs -->
    <h3>Tarifs:</h3>
    <table>
        <thead>
            <tr>
                <th>Prix</th>
                <th>Condition</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotel->tarifs as $tarif)
            <tr>
                <td style="display: flex; width: 95%; justify-content: center;"><p>دج</p>{{ $tarif->prix }} </td>
                <td>{{ $tarif->condition }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Display Photos -->
    <h3>Photos:</h3>
    <!-- <div>
        @foreach($hotel->photos as $photo)
        <img src="{{asset('/storage/images/'.$photo->photo)}}" alt="Photo de l'hôtel" width="200px" height="150px">
        @endforeach
    </div> -->

    <div class="sliding-container">
    

<div id="gallery" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
         @foreach($hotel->photos as $photo)
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('/storage/images/'.$photo->photo) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>
</div>


    <a href="{{ route('hotels.index') }}">Retour à la liste des hôtels</a>

    <script>
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');
        let currentSlide = 0;
        
        function showSlide(index) {
            if (index < 0) {
                currentSlide = slides.length - 1;
            } else if (index >= slides.length) {
                currentSlide = 0;
            } else {
                currentSlide = index;
            }
        
            const offset = -currentSlide * 100;
            document.querySelector('.slides-container').style.transform = `translateX(${offset}%)`;
        }
        
        prevBtn.addEventListener('click', () => {
            showSlide(currentSlide - 1);
        });
        
        nextBtn.addEventListener('click', () => {
            showSlide(currentSlide + 1);
        });
        
        
    </script>
    
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</div>
</body>
</html>
